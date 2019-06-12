<?php

extract($_REQUEST);

$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "DBA";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql
// sql to delete a record
$sql = "DELETE FROM COMPANY WHERE id=3";

if ($conn->query($sql) === TRUE) {
    header('location: index.php');
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>