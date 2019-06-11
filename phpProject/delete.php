<?php

extract($_REQUEST);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "DBA";

// Connect to the database and make sure it was successful
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare the query string
$sql = <<<SQL
DELETE FROM COMPANY
 WHERE COM_ID = $id
SQL;

// Execute the query and display the results
if ($conn->query($sql) === TRUE) {
    //echo "Record deleted successfully";
    header('Location: index.php');
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();

?>