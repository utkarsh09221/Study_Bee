<?php
$host = 'mysql-utkarsh09221.alwaysdata.net';
$username = '420678';
$password = 'Sudha2908@';
$database = 'utkarsh09221_studybee';

$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
