<?php
    require_once '../config/database.php';
    session_start();
    $image = str_replace(" ", "+", $_POST['image']);
    $image = str_replace("data:image/png;base64,", "", $image);
    $statement = $conn->prepare("INSERT INTO `photos`(`imagedata`, `uploaderID`) VALUES (:img, :uploader);");
    $statement->bindParam(":img", $image);
    $userid = $_SESSION['UID'];
    $statement->bindParam(":uploader", $userid);
    try{
        $statement->execute();
    } catch (PDOException $e)
    {
        echo $e;
    }
?>