<?php
    set_include_path('../config');
    require_once('database.php');
    set_include_path('./');

    if(isset($_GET['verify']))
    {
        $check = $conn->prepare("SELECT * FROM `camagru`.`users` WHERE `verifykey`=:verify;");
        $query = "UPDATE `camagru`.`users` SET `isVerified` = 1 WHERE `verifykey`=:verify;";
        $stmt = $conn->prepare($query);
        $verify = $_GET['verify'];
        $stmt->bindParam(":verify", $verify);
        $check->bindParam(":verify", $verify);

        try
        {
            $check->execute();
            if ($check->fetch())
            {
                $stmt->execute();
                header("Location: ../index.php?page=Gallery");
            }
            else
            {
                header("Location: fail.php");
            }
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }

?>