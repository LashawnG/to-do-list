<?php
$servername = "localhost";
$username = "root";
$password = "root";
$myDB = "todolist";

header('Content-type: text/html; charset=iso-8859-1');

//Verbinding maken met de database
try {
    $conn = new PDO("mysql:host=$servername;dbname=$myDB", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Verbinding Mislukt!" . $e->getMessage();
}
