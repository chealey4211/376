<html>
    <head>
        <title>PHP Lesson 1</title>
    </head>

    <body style="margin: 5px;">
        <h1>Company Database</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Address</th>
            <th>Address 2</th>
            <th>City</th>
        </tr>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "DBA";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT COM_NAME, COM_ID, COM_ADDRESS_LINE1, COM_ADDRESS_LINE2, COM_CITY FROM COMPANY Order by COM_NAME";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>" . $row["COM_ID"]."</td><td>" .$row["COM_NAME"]. " " ."</td><td>" .$row["COM_ADDRESS_LINE1"]. " " ."</td><td>" .$row["COM_ADDRESS_LINE2"]. " " ."</td><td>" .$row["COM_CITY"]. " " ."</td></tr>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?>
    </body>
</html>