<!DOCTYPE html>
<html>
    <head>
    <link href="css/all.css" rel="stylesheet">
        <title>DBA Project</title>
        
        <script>
        
        function deleteCompany(id) {
            if (confirm("Are you sure you want to delete ID number " + id + "?")) {
                location.href = "delete.php?id=" +id;
            }
        }
        
        function updateCompany(id) {
                location.href = "edit.php?id=" +id;
        }
        
        </script>
    </head>

    <body background = "background.jpg">

        <h1 style= "color:blue;">Company List</h1>

        <p style="font-style:italic;">The following companies have been registered in the database.</p>

        <table border="1">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>City</th>
                <th>State</th>
                <th>ZIP Code</th>
                <th>Phone Number</th>
                <th>Company Website</th>
                <th>Actions</th>
            </tr>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "DBA";

// Connect to the database and make sure it was successful
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare the query string (we use HEREDOC syntax to avoid messing around with double quotes and string concatentation)
$sql = <<<SQL
SELECT COM_ID,
       COM_NAME,
       COM_ADDRESS_LINE1,
       COM_ADDRESS_LINE2,
       COM_CITY,
       COM_STATE,
       COM_ZIP_CODE,
       COM_PHONE_NUMBER,
       COM_WEBSITE
  FROM COMPANY
 ORDER BY COM_NAME
SQL;

// Execute the query and display the results
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // Iterate over each row in the results
    while ($row = $result->fetch_assoc()) {
        echo "<tr>" .
             "<td>" . $row["COM_ID"] . "</td>" .
             "<td>" . $row["COM_NAME"] . "</td>" .
             "<td>" . $row["COM_ADDRESS_LINE1"] . " " . $row["COM_ADDRESS_LINE2"] . "</td>" .
             "<td>" . $row["COM_CITY"] . "</td>" .
             "<td>" . $row["COM_STATE"] . "</td>" .
             "<td>" . $row["COM_ZIP_CODE"] . "</td>" .
             "<td>" . $row["COM_PHONE_NUMBER"] . "</td>" .
             "<td><a href='" . $row["COM_WEBSITE"] . "'</a>" . $row["COM_WEBSITE"] . "</td>" .
             "<td><button onclick='deleteCompany(" . $row["COM_ID"] . ")'>Delete</i>  <button onclick='updateCompany(" . $row["COM_ID"] . ")'>Edit</i></td>" .
             "</tr>";
    }
} else {
    echo "<tr><td colspan='2'>0 results</td></tr>";
}

$conn->close();

?>

        </table><br>
            <button onclick="location.href = 'create.php'">Add Company</i> 
    </body>
</html>
