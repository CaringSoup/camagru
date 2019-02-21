<?php
    require_once("config/database.php");
    session_start();
    
    if (isset($_POST['type']) && $_POST['type'] == 'set' && isset($_POST['imgID']))
        setComments($_POST['imgID']);
    else if (isset($_POST['type']) && $_POST['type'] == 'fetch' && isset($_POST['imgID']))
        getComments($_POST['imgID']);
    else
        echo '<h2>No Comments</h2>';

    function setComments($imgID){
        global $conn;
        $uid = $_SESSION['username'];
        $comment = (isset($_POST['comment']) && !empty($_POST['comment']) ) ? htmlentities($_POST['comment']) : "I am a retarded user.";
        
        try
        {
            $query = $conn->prepare("INSERT INTO `camagru`.`comments` (`image_id`, `commenter_id`, `comment`) VALUES (:imgid, :user, :comment);");
            $query->bindParam(':imgid', $imgID);
            $query->bindParam(':user', $uid);
            $query->bindParam(':comment', $comment);
            $query->execute();
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    function getComments($imgID) {
        global $conn;
        try
        {
            $query = "SELECT * FROM `camagru`.`comments` WHERE `image_id`=:id;";
            $result = $conn->prepare($query);
            $result->bindParam(':id', $imgID);
            $result->execute();
            $result->SetFetchMode(PDO::FETCH_ASSOC);
            $final = $result->fetchAll();
            $x = count($final);
            if ($x == 0) 
                echo "<h2>There are no comments</h2>";
            foreach($final as $key => $val)
            {
                echo "<div class='comment-box'>";
                echo '<div class="comment-user">' . $val['commenter_id'] . '</div>'; 
                echo '<div class="comment-content">' . $val['comment'] . '</div>';
                echo "</div>";
            }
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }
?>