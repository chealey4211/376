<!DOCTYPE html>
<html>
    <head>
        <title>PHP Lesson 1</title>
    </head>

    <body style="margin: 5px;">

        <?php

        // Keywords are NOT case-sensitive (variables and functions are)
        echo "<h1>Welcome to PHP!</h1>";
        eCHo "<br>";
        ECHO "It's a great language to know";
        ECho "<br><br>";

        $name = "Mr. Ciccolo";

        // String concatenation
        echo "Hello " . $name . "! (with concatenation)";
        echo "<br>";

        // String interpolation - it only works with double-quoted strings!
        echo "Hello $name! (with interpolation)";
        echo "<br>";
        echo 'Hello $name!';
        echo "<br><br>";

        // Variables and simple arithmetic
        $x = 4;
        $y = 3;
        $z = $x + $y;
        echo "$x + $y = $z";
        echo "<br>";

        // Functions can take paramters and return values
        echo "$x squared is " . square($x);
        function square($number)
        {
            return $number * $number;
        }

        // Get all the PHP configuration information
        phpinfo();

        ?>

    </body>
</html>