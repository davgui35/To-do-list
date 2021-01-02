<?php

$hostName = 'localhost';
$userName = 'root';
$pass = "";
$db_name = "to_do_list";

try {
    $conn = new PDO("mysql:host=$hostName;dbname=$db_name", $userName, $pass);
    $conn->setAttribute(Pdo::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected !";
} catch (PDOException $e) {
    echo "Connection failed : " . $e->getMessage();
}
