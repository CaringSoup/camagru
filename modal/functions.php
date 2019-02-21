<?php
    function regextest($case, $value) {
        switch ($case) {
            case 1:
                return (preg_match('/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*(\.[a-zA-Z]{2,10})$/', $value));
                break;
            case 2:
                return (preg_match('/^(?=.*\d)(?=.*[^a-zA-Z\d])(?=.*[a-z])(?=.*[A-Z]).{8,}$/', $value));
                break;
        }
    }

    function sendmail($email, $verify)
    {
        // echo $email . " " . $verify;
        $from = "admin@camagru.com";
		$to = $email;
		$subject = "Verify Camagru Account";
		$message = "<html><body>";
        $message .= "Please click on the following link to activate your Camagru account.\n";
		$loc = $_SERVER['REQUEST_URI'];
		$message .= "<a href='http://".$_SERVER['HTTP_HOST'] . $loc ."/../verify.php?verify=".$verify."'><p>Click me!!</p></a>";
		$message .= "</body></html>";
		$headers = "From:" . $from . "\r\n";
		$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
		$headers .= "X-Mailer: PHP/" . PHP_VERSION;
		mail($to,$subject,$message, $headers);
    }

    function notifyEmail($email, $type, $user)
    {
        $from = "admin@camagru.com";
        $to = $email;
        $loc = $_SERVER['REQUEST_URI'];
        $headers = "From:" . $from . "\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
        $headers .= "X-Mailer: PHP/" . PHP_VERSION;
        switch ($type)
        {
            case "comment":
                $subject = "$user commented your post";
                $message = "<html><body>";
                $message .= "Another member has commented on one of your posts. Log in to find it what they said!\n";
                $message .= "</body></html>";
                break;
            case "like":
                $subject = "$user liked your post";
                $message = "<html><body>";
                $message .= "Another member has liked one of your posts. Log in to find it which post they liked!.\n";
                $message .= "</body></html>";
                break;
            default:
                break;
            }
            mail($to, $subject, $message, $headers);
        }
?>