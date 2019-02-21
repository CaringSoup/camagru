<?php
    set_include_path("./");
    require_once("config/database.php");
    session_start();
    global $conn;
    $query = "SELECT * FROM `camagru`.`photos` ORDER BY `id` DESC";
    try
    {
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();
        echo "<div class='grid'>";
        foreach($result as $k=>$v)
        {
            echo "<div class='grid-element'>";
            echo "<img class='image' src='data:image/png; base64, " . $v['imagedata'] ."'><br>";
            if(isset($_SESSION['username']))
            {
             echo   '<div class="coloumn" align="center">
                        <i onclick="myLikes(this)" id="' . $v['id'] . '" class="fa fa-thumbs-up"></i>
                        <button onclick="myComments(\''.$v['id'].'\')">Comment</button>
                        <div id="commentdiv'.$v['id'].'" style="display: none">
                                Comment:<br/>
                                <textarea name="comment" id="'.$v['id'].'-comment"></textarea><br/>
                                <input type="submit" name="post" onclick="submitcomment('.$v['id'].')" value="Submit"/>
                        </div>
                        <button onclick="showComments(' . $v['id'] . ', this)">View Comments</button>
                        <div class="comment-display" id="insertcomment' . $v['id'] . '" style="display: none">
                        </div>';
                
                if ($_SESSION['UID'] == $v['uploaderID'])
                    echo '<button onclick="deleteImage(\''.$v['id'].'\')">Delete Image</button>';

                echo "</div>";
                $query = "SELECT * FROM `camagru`.`likes` WHERE `image_id`=:IID AND `user_id`=:userid";
                $stmt = $conn->prepare($query);
                $stmt->bindParam(":IID", $v['id']);
                $stmt->bindParam("userid", $_SESSION['UID']);
                $stmt->execute();
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                if ($stmt->fetch() > 0)
                {
                    echo "  <script>
                                document.getElementById('".$v['id']."').classList.toggle('fa-thumbs-down');
                            </script>";
                }
            }
            echo "</div>";
        }
        echo "</div>";
    }
    catch (PDOException $e)
    {
        echo $e->getMessage();
    }
