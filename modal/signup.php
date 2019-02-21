<?php
    set_include_path('../config');
    require_once('database.php');
    require_once('functions.php');
    set_include_path('./');

    if (isset($_POST['username']) && ($_POST['username'] !== ''))
    {
        $query = "INSERT INTO camagru.users (username, password, verifykey, email) VALUES (:username, :password, :verifykey, :email);";
        $stmt = $conn->prepare($query);
        $username = $_POST['username'];
        //Password hash.
        $password = $_POST['password'];
        $passconfirm = $_POST['confirm'];
        $email = $_POST['email'];
        if ((regextest(2, $password)) && ($password == $passconfirm))
        {
            if (regextest(1, $email)) {
                $password = hash("sha512", $_POST['password']);
                $passconfirm = hash("sha512", $_POST['confirm']);
                //Verification email hash.
                $verify = hash("sha512", $username . time());
                $stmt->bindParam(":username", $username);
                $stmt->bindParam(":password", $password);
                $stmt->bindParam(":verifykey", $verify);
                $stmt->bindParam(":email", $email);
                
                try
                {
                    $stmt->execute();
                    sendmail($email, $verify);
                    echo "Please check emails for verification link";
                }
                catch (PDOException $e)
                {
                    echo $e->getMessage();
                }
            }
            else
            {
                echo "Not a valid email address";
            }
        }
        else
        {
            echo "Sorry, your passwords don't match OR your password does not fulfil the requirements. Please enter a passsword with AT LEAST 8 characters containing 1 upper case, 1 lower case, 1 number and 1 special character";
        }
    }
    else
    {
        echo "Please fill in ALL fields. If there is a blank field this message will pop up again. Have a great day inspite of yourself.";
    }

    
?>