<?php
    set_include_path('../config');
    require_once('database.php');
    set_include_path('./');

    if(isset($_GET['verify']))
    {
        $query = "UPDATE `camagru`.`users` SET `isVerified` = 1 WHERE `verifykey`=:verify;";
        $stmt = $conn->prepare($query);
        $verify = $_GET['verify'];
        $stmt->bindParam(":verify", $verify);

        try
        {
            $stmt->execute();
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }

?>


    /*
        Like button -> contain ImageID -> likes.php => OUR UID and ImageID -> table of likes.

        Comment Button -> reference the box -> foreach box int x ^ per row

        CommentBox -> Values(contents) && ImageID -> comments.php => OUR UID($_SESSION['UID']) ImageID(int) and Contents(text) -> Table of comments
    */