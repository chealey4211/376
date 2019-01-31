<!DOCTYPE html>
<html>
    <head>
        <title>Craps</title>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="scripts.js?<?php echo rand(); ?>"></script>

        <link rel="stylesheet" type="text/css" href="styles.css?<?php echo rand(); ?>" />
    </head>

    <body>

        <h1>Craps</h1>

        <svg width="500" height="400">
            <rect id="background" x="8" y="8" width="500" height="400"/>
            
            <g>
                <rect id="d1" class="die" x="100" y="100" width="100" height="100" />
                <circle id="d1p1" class="pip" cx="125" cy="125" r="5"  />
                <circle id="d1p2" class="pip" cx="125" cy="150" r="5" />
                <circle id="d1p3" class="pip" cx="125" cy="175" r="5" />
                <circle id="d1p4" class="pip" cx="150" cy="150" r="5" />
                <circle id="d1p5" class="pip" cx="175" cy="125" r="5" />
                <circle id="d1p6" class="pip" cx="175" cy="150" r="5" />
                <circle id="d1p7" class="pip" cx="175" cy="175" r="5" />
            </g>

            <g>
                <rect id="d2" class="die" x="300" y="100" width="100" height="100" />
                <circle id="d2p1" class="pip" cx="325" cy="125" r="5"  />
                <circle id="d2p2" class="pip" cx="325" cy="150" r="5" />
                <circle id="d2p3" class="pip" cx="325" cy="175" r="5" />
                <circle id="d2p4" class="pip" cx="350" cy="150" r="5" />
                <circle id="d2p5" class="pip" cx="375" cy="125" r="5" />
                <circle id="d2p6" class="pip" cx="375" cy="150" r="5" />
                <circle id="d2p7" class="pip" cx="375" cy="175" r="5" />
            </g>
            <rect x="225" y="300" width="50" height="50"/>
            <text id="results" x="250" y="311">8</text>
        </svg>
    
        <button onclick="rollDice()">Roll the Dice!</button>

    </body>
</html>