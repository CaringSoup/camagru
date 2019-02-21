<?php
    require_once("config/database.php");
    session_start();
    if ($_SESSION['UID']) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $query = "SELECT * FROM `camagru`.`likes` WHERE `image_id`=:img_id AND `user_id`=:id;";
            try
            {
                $stmt = $db->prepare($query);
                $_imgid = $_POST['img_id'];
                $stmt->bindParam("img_id", $_imgid);
                $_id = $_SESSION['UID'];
                $stmt->bindParam("id", $_id);
                $stmt->execute();
                $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $result = $stmt->fetchAll();
                if ($result)
                {
                    $query = "DELETE FROM `camagru`.`likes` WHERE `image_id`=:img_id AND `user_id`=:id;";
                    $stmt = $db->prepare($query);
                    $_imgid = $_POST['img_id'];
                    $stmt->bindParam("img_id", $_imgid);
                    $_id = $_SESSION['UID'];
                    $stmt->bindParam("id", $_id);
                    $stmt->execute();
                    echo 'Disliked';
                } else {
                    $query = "INSERT INTO `camagru`.`likes` (`image_id`, `user_id`) VALUES (:img_id, :id)";
                    $stmt = $db->prepare($query);
                    $_imgid = $_POST['img_id'];
                    $stmt->bindParam("img_id", $_imgid);
                    $_id = $_SESSION['UID'];
                    $stmt->bindParam("id", $_id);
                    $stmt->execute();
                    echo 'Liked';
                }
            }
            catch (PDOException $e)
            {
                echo $e->getMessage();
            }
    } 
}
?>