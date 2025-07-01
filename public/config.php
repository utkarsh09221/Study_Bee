<?php
$servername = "mysql-utkarsh09221.alwaysdata.net";
$username = "420678_"; // replace with the final user you created
$password = "Sudha2908@";        // replace with the password you set
$dbname = "utkarsh09221_studybee"; // full DB name you created

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
