<?php
    set_include_path('../config');
    require_once("database.php");
    set_include_path('./');
    $username = $_POST['username'];
    $password = hash("sha512", $_POST['password']);

    session_start();
    try
    {
        $query = "SELECT * FROM `camagru`.`users` WHERE `username` = :uname;";
        $stmt = $db->prepare($query);
        $stmt->bindParam(":uname", $username);
        $stmt->execute();
        $stmt->SetFetchMode(PDO::FETCH_ASSOC);
        $user = $stmt->fetch();
        if ($user['username'] == $username && $user['password'] == $password && $user['isVerified'] == 1)
        {
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['UID'] = $user['id'];
            header("Location: ../?loginreturn=success");
        }
        else
            header("Location: ../?loginreturn=Fail");
    }
    catch (PDOException $e)
    {
        echo "Cannot do the login : " . $e->getMessage();
    }
?>