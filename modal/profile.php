<?php
    require_once("config/database.php");
    session_start();
    if ($_SESSION['UID']) {
        $query = "SELECT * FROM camagru.photos WHERE uploaderID=:id ORDER BY id ASC;";
    try
    {
        $stmt = $conn->prepare($query);
        $id = $_SESSION['UID'];
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $val = $stmt->fetchAll();
        foreach ($val as $img) {
            echo '<img src="data:image/png;base64,'.$img['imagedata'].'">';
        }
    }
    catch (PDOException $e)
    {
        echo $e->getMessage();
    }
}
?>