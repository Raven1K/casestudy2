<?php

$servername = "us-cdbr-east-06.cleardb.net";
$username = "bbc7383f40e78b";
$password = "4fbff9bd";
$database = "heroku_fe19d1fa6e9b61d";

try {

    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // set the PDO error mode to exception
    // echo "Connected Successfully";
    
} catch(PDOException $e) {

    echo "Connection Failed" .$e->getMessage();
}

?>