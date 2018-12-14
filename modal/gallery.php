<?php
    set_include_path("./");
    require_once("config/database.php");
    session_start();
    global $conn;
    $query = "SELECT * FROM camagru.photos ORDER BY id ASC;";
    try
    {
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();
        foreach($result as $k=>$v)
        {
            echo "<img src='data:image/png; base64, " . $v['imagedata'] ."'><br>";
            if(isset($_SESSION['username']))
            {
             echo   '<div class="row">
                        <i onclick="myLikes(this)" id="' . $v['id'] . '" data-userid="'.$v['uploaderID'].'" class="fa fa-thumbs-up"></i>
                        <button onclick="myComments()" id="' . $v['id'] . '">Comments</button>
                        <div id="myDIV">
                            <form method="post">
                                Comment:<br/>
                                <textarea name="comment" id="'. $v['uploaderID'] . '"></textarea><br/>
                                <input type="hidden" name="articleid" id="' . $v['id'] . '" value=""/> 
                                <input type="submit" value="Submit"/>
                            </form>
                            </div>
                    </div>';
            }
        }
    }
    catch (PDOException $e)
    {
        echo $e->getMessage();
    }
