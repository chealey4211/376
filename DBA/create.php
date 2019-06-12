<?php

extract($_REQUEST);
if (!isset($submit)) {

?>
<!DOCTYPE html>
<html>
    <head>
        <title>DBA Project</title>

        <style>

            .label {
                display: inline-block;
                font-weight: bold;
                width: 150px;
            }

        </style>
    </head>

    <body>

        <h1>New Company</h1>

        <p>Add the details to register a company in the database.</p>

        <form action="create.php" method="post">
            <div class="label">Name:</div><input type="text" name="name" />
            <br />
            <div class="label">Address Line 1:</div><input type="text" name="addressLine1" />
            <br />
            <div class="label">Address Line 2:</div><input type="text" name="addressLine2" />
            <br />
            <div class="label">City:</div><input type="text" name="city" />
            <br />
            <div class="label">State:</div><input type="text" name="state" />
            <br />
            <div class="label">ZIP Code:</div><input type="text" name="zipCode" />
            <br />
            <div class="label">Phone Number:</div><input type="text" name="phoneNumber" />
            <br />
            <button type="submit" name="submit">Save</button>
        </form>
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

    // Prepare the query string (we use HEREDOC syntax to avoid messing around with double quotes and string concatentation)
    $sql = <<<SQL
    INSERT INTO COMPANY (COM_NAME, COM_ADDRESS_LINE1, COM_ADDRESS_LINE2, COM_CITY, COM_STATE, COM_ZIP_CODE, COM_PHONE_NUMBER)
      VALUES ('$name', '$addressLine1', '$addressLine2', '$city', '$state', '$zipCode', '$phoneNumber')
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