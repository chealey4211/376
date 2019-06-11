<?php

    extract($_REQUEST);
    if (!isset($submit)) {
    
    ?>
    <!DOCTYPE html>
    <html>
        <head>
            <title>DBA Project</title>
        <link href="css/all.css" rel="stylesheet">
            <style>
    
                .label {
                    display: inline-block;
                    font-weight: bold;
                    width: 150px;
                }
    
            </style>
        </head>
    
        <body background = "background.jpg">
    
            <h1 style= "color:blue;">New Company</h1>
    
            <p style="font-style:italic;">Add the details to register a company in the database.</p>
        
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
 WHERE COM_ID = $id;
SQL;

// Execute the query and display the results
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // Iterate over each row in the results
    while ($row = $result->fetch_assoc()) {
?>
            <form action="edit.php" method="post">
                <div class="label">Name:</div><input type="text" name="name" value="<?php echo $row['COM_NAME']; ?>" />
                <br />
                <div class="label">Address Line 1:</div><input type="text" name="addressLine1" value="<?php echo $row['COM_ADDRESS_LINE1']; ?>" />
                <br />
                <div class="label">Address Line 2:</div><input type="text" name="addressLine2" value="<?php echo $row['COM_ADDRESS_LINE2']; ?>" />
                <br />
                <div class="label">City:</div><input type="text" name="city" value="<?php echo $row['COM_CITY']; ?>" />
                <br />
                <div class="label">State:</div><input type="text" name="state" value="<?php echo $row['COM_STATE']; ?>" />
                <br />
                <div class="label">ZIP Code:</div><input type="text" name="zipCode" value="<?php echo $row['COM_ZIP_CODE']; ?>" />
                <br />
                <div class="label">Phone Number:</div><input type="text" name="phoneNumber" value="<?php echo $row['COM_PHONE_NUMBER']; ?>" />
                <br />
                <div class="label">Company Website:</div><input type="text" name="website" value="<?php echo $row['COM_WEBSITE']; ?>" />
                <input type='hidden' name='id' value="<?php echo $row['COM_ID']; ?>" />
                
            </form>
<?php

    }     

}

?>
            <button type="submit" name="submit">Save</button>
            <button onclick="location.href = 'index.php'">Cancel</button>
    
        </body>
    </html>
    <?php
    
    }
    else
    {
        //echo "Submitted! " . $_POST['name'] . ", " . $_POST['phoneNumber'];
    
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "DBA";
    
        // Connect to the database and make sure it was successful
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
    
        // Sanitize all input values to prevent SQL injection exploits
        $name = $conn->real_escape_string($name);
        $addressLine1 = $conn->real_escape_string($addressLine1);
        $addressLine2 = $conn->real_escape_string($addressLine2);
        $city = $conn->real_escape_string($city);
        $state = $conn->real_escape_string($state);
        $zipCode = $conn->real_escape_string($zipCode);
        $phoneNumber = $conn->real_escape_string($phoneNumber);
        $website = $conn->real_escape_string($website);

    // Prepare the query string (we use HEREDOC syntax to avoid messing around with double quotes and string concatentation)
    $sql = <<<SQL
    
UPDATE COMPANY
SET COM_NAME = "$name",
    COM_ADDRESS_LINE1 = "$addressLine1",
    COM_ADDRESS_LINE2 = "$addressLine2",
    COM_CITY = "$city",
    COM_STATE = "$state",
    COM_ZIP_CODE = "$zipCode",
    COM_PHONE_NUMBER = "$phoneNumber",
    COM_WEBSITE = "$website"
WHERE COM_ID = $id    
SQL;
    
    // Execute the query and display the results
    if ($conn->query($sql) === TRUE) {
        //echo "New company created successfully";
        header('Location: index.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

?>

