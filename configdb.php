<?php
//$servername = "localhost";
//$username = "root";
//$password = "";
//$dbname = "gamclass";

$servername = "localhost";
$username = "admin_4khooneokroozbeh";
$password = "khakhol123!@#";
$dbname = "admin_4khooneokroozbeh";

$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8mb4");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}