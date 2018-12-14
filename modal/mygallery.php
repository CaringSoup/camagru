<?php
    set_include_path("./");
    require_once("config/database.php");
    session_start();
    global $conn;
if ($_SESSION['username']) {
    $query = "SELECT * FROM camagru.photos WHERE uploaderID=:id ORDER BY id ASC;";
    try
    {
        $stmt = $conn->prepare($query);
        $id = $_SESSION['UID'];
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();
        foreach($result as $k=>$v)
        {
            echo $v['imagedata'] ."<br>";
        }
    }
    catch (PDOException $e)
    {
        echo $e->getMessage();
    }
}