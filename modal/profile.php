<?php
    require_once("config/database.php");
    session_start();
    if ($_SESSION['UID']) {
        $query = "SELECT * FROM camagru.photos WHERE uploaderID=:id ORDER BY id DESC;";
    try
    {
        $stmt = $conn->prepare($query);
        $id = $_SESSION['UID'];
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $val = $stmt->fetchAll();

        echo "<div class='grid'>";
        foreach ($val as $img) {
            echo "<div class='grid-element'>";
            echo '<img class="image" src="data:image/png;base64,'.$img['imagedata'].'">';
            echo "</div>";
        }
        echo "</div>";
    }
    catch (PDOException $e)
    {
        echo $e->getMessage();
    }
}
?>