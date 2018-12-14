<?php
    set_include_path('../config');
    require_once('database.php');
    set_include_path('./');

    if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['confirm']) && isset($_POST['email']))
    {
        $query = "INSERT INTO camagru.users (username, password, verifykey, email) VALUES (:username, :password, :verifykey, :email);";
        $stmt = $conn->prepare($query);
        $username = $_POST['username'];
        //Password hash.
        $password = hash("sha512", $_POST['password']);
        $passconfirm = hash("sha512", $_POST['confirm']);
        if ($password == $passconfirm)
        {
            //Verification email hash.
            $verify = hash("sha512", $username . time());
            $email = $_POST['email'];
            $stmt->bindParam(":username", $username);
            $stmt->bindParam(":password", $password);
            $stmt->bindParam(":verifykey", $verify);
            $stmt->bindParam(":email", $email);
            
            try
            {
                $stmt->execute();
                sendmail($email, $verify);
                mail("jwolf@mailinator.com", "Weee", "Eish");
            }
            catch (PDOException $e)
            {
                echo $e->getMessage();
            }
        }
        else
        {
            echo "Sorry, your passwords don't match";
        }
    }
    function sendmail($email, $verify)
    {
        echo $email . " " . $verify;
        $from = "admin@camagru.com";
		$to = $email;
		$subject = "Verify Camagru Account";
		$message = "<html><body>";
        $message .= "Please click on the following link to allow us to activate you account\n";
        //https://localhost:8080/Camagru/profile/validate.php
		$loc = $_SERVER['REQUEST_URI'];
		$message .= "<a href='http://".$_SERVER['HTTP_HOST'] . $loc ."/../verify.php?verify=".$verify."'><p>Click me!!</p></a>";
		$message .= "</body></html>";
		$headers = "From:" . $from . "\r\n";
		$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
		$headers .= "X-Mailer: PHP/" . PHP_VERSION;
		mail($to,$subject,$message, $headers);
    }
?>