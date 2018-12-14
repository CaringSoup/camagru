<?php
    require_once("config/database.php");
    session_start();
    echo $_POST;
    if ($_SESSION['username']) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $query = "SELECT * FROM `camagru`.`likes` WHERE `image_id` = {$_POST['img_id']} AND `user_id` = {$_POST['user_id']}";
            try
            {
                $stmt = $db->prepare($query);
                $stmt->execute();
                $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $result = $stmt->fetchAll();
                if ($result)
                {
                    echo $result;
                    //$query = "DELETE * FROM `camagru`.`likes` WHERE `image_id` = {$_POST['img_id']} AND `user_id` = {$_POST['user_id']}";
                    echo 'Deleted';
                } else {
                    echo $result;
                    //$query = "INSERT * FROM `camagru`.`likes` WHERE `image_id` = {$_POST['img_id']} AND `user_id` = {$_POST['user_id']}";
                    echo 'liked';
                }
            }
            catch (PDOException $e)
            {
                echo $e->getMessage();
            }
    } 
}
?>