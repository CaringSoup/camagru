<?php

$DB_DSN = "127.0.0.1";
$DB_USER = "root";
$DB_PASSWORD = "Emshareed16";
$DB_NAME = 'camagru';

/*
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);
*/

try
{
    $db = new PDO("mysql:host=$DB_DSN", $DB_USER, $DB_PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
    echo "Error: ".$e->getMessage();
}

try{
    $sql = "CREATE DATABASE IF NOT EXISTS ".$DB_NAME;
    if($db->exec($sql)){
        try {
            $conn = new PDO("mysql:host=$DB_DSN;dbname=$DB_NAME", $DB_USER, $DB_PASSWORD);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e)
        {
            echo "Error: " . $e->getMessage();
        }
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>