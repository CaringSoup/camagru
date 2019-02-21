<?php
    require_once '../config/database.php';
    session_start();

    $img = $_POST['image'];
    $img = str_replace(" ", "+", $img);
    $img = str_replace("data:image/png;base64,", "", $img);
    $img = base64_decode($img);
    $img = imagecreatefromstring($img);
    imagepng($img, 'save.png');
    if ($_POST['jb'] == 'true')
    {
        $stick = imagecreatefrompng("../superimpose/jb.png");
        $img = imagecreatefrompng('save.png');
        imagealphablending($img, true);
        imagesavealpha($img, true);
        $stick = imagescale($stick, $_POST['width'], $_POST['height']);
        imagesavealpha($stick, true);
        imagecopy($img, $stick, 0, 0, 0, 0, $_POST['width'], $_POST['height']);
        imagepng($img, 'save.png');
    }if ($_POST['bbeard'] == 'true')
    {
        $stick = imagecreatefrompng("../superimpose/black_beard.png");
        $img = imagecreatefrompng('save.png');
        imagealphablending($img, true);
        imagesavealpha($img, true);
        $stick = imagescale($stick, (28/100 * $_POST['width']), (28/100 * $_POST['height']));
        imagesavealpha($stick, true);
        imagecopy($img, $stick, (40/100 * $_POST['width']), (52/100 * $_POST['height']), 0, 0, (28/100 * $_POST['width']), (28/100 * $_POST['height']));
        imagepng($img, 'save.png');
    }if ($_POST['santa'] == 'true')
    {
        $stick = imagecreatefrompng("../superimpose/santa_hat.png");
        $img = imagecreatefrompng('save.png');
        imagealphablending($img, true);
        imagesavealpha($img, true);
        $stick = imagescale($stick, (45/100 * $_POST['width']), (45/100 * $_POST['height']));
        imagesavealpha($stick, true);
        imagecopy($img, $stick, (40/100 * $_POST['width']), (8/100 * $_POST['height']), 0, 0, (45/100 * $_POST['width']), (45/100 * $_POST['height']));
        imagepng($img, 'save.png');
    }
    $img = base64_encode(file_get_contents('save.png'));
    unlink("save.png");

    $statement = $conn->prepare("INSERT INTO `photos`(`imagedata`, `uploaderID`) VALUES (:img, :uploader);");
    $statement->bindParam(":img", $img);
    $userid = $_SESSION['UID'];
    $statement->bindParam(":uploader", $userid);
    try{
        $statement->execute();
        echo "<br/><p class='success' style='color: green;'>Your image has been save to your profile as well as the gallery for all to see! Let's hope it's not fucked up :)!</p>";
    } catch (PDOException $e)
    {
        echo $e;
    }
?>