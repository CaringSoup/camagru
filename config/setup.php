<?php
    require_once 'database.php';

   try
    {
        $query = "CREATE TABLE IF NOT EXISTS `users` (
            `id` INT AUTO_INCREMENT PRIMARY KEY,
            `username` varchar(50) NOT NULL,
            `password` varchar(1024) NOT NULL,
            `email` varchar(150) NOT NULL,
            `isVerified` int DEFAULT 0,
            `notifications` int DEFAULT 1,
            `verifykey` varchar(128) NOT NULL
            );";
        $users = $conn->prepare($query);
        $users->execute();
    }
    catch (PODException $e)
    {
        echo "USERS :: " . $e->getMessage();
    }

    try
    {
        $photos = $conn->prepare("CREATE TABLE IF NOT EXISTS `photos` (
            `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            `imagedata` BLOB(4294967295) NOT NULL,
            `uploaderID` INT NOT NULL
            );"
        );
        $photos->execute();
    }
    catch (PDOException $e)
    {
        echo "PHOTOS :: " . $e->getMessage();
    }

    try
    {
        $likes = $conn->prepare("CREATE TABLE IF NOT EXISTS `likes` (
            `image_id` INT NOT NULL,
            `user_id` INT NOT NULL
            );"
        );
        $likes->execute();
    }
    catch (PDOException $e)
    {
        echo "LIKES :: " . $e->getMessage();
    }

    try
    {
        $comments = $conn->prepare("CREATE TABLE IF NOT EXISTS `comments` (
            `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            `comment` varchar(1024),
            `commenter_id` INT NOT NULL,
            `image_id` INT NOT NULL
            );"
        );
        $comments->execute();
    }
    catch (PDOException $e)
    {
        echo "COMMENTS :: " . $e->getMessage();
    }
?>