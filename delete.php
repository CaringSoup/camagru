<?php
    require_once("config/database.php");
    session_start();
    global $conn;
    if ($_SESSION['UID']) {
        $query = "DELETE FROM `camagru`.`photos` WHERE id=:id AND uploaderID=:uploader_id;";
        try
        {
            $stmt = $conn->prepare($query);
            $stmt->bindParam(":id", $_POST['imageid']);
            $stmt->bindParam(":uploader_id", $_SESSION['UID']);
            $stmt->execute();
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
        }
        
        $query = "DELETE FROM `camagru`.`likes` WHERE image_id=:id";
        try
        {
            $stmt = $conn->prepare($query);
            $stmt->bindParam(":id", $_POST['imageid']);
            $stmt->execute();
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
        }
        
        $query = "DELETE FROM `camagru`.`comments` WHERE image_id=:id";
        try
        {
            $stmt = $conn->prepare($query);
            $stmt->bindParam(":id", $_POST['imageid']);
            $stmt->execute();
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }
?>