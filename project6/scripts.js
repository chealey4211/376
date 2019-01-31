/*
 * Prepares the game with an initial dice roll.
 */
$(document).ready(function () {
    rollDice();
});

/*
 * Rolls both dice at the same time.
 */
function rollDice() {
    var roll1 = rollDie("d1");
    var roll2 = rollDie("d2");
    var total = roll1 + roll2;
    console.log("Total: " + total);
    
    $("#results").text(total);
    console.log("total; " + total);
}

/*
 * Rolls the given die which updates the pips and returns the number rolled.
 *
 * dieNum - the ID of the die to roll
 */
function rollDie(dieNum) {
    // Step 1: hide every pip
    $("#" + dieNum + " ~ .pip").css("visibility", "hidden");

    // Step 2: generate a random number between 1 and 6 (inclusive)
    var roll = Math.ceil(Math.random() * 6);
    console.log(dieNum + ": " + roll);

    // Step 3: show the appropriate pips based on the roll
    if (roll == 1) {
        $("#" + dieNum + "p4").css("visibility", "visible");
    } else if (roll == 2) {
        $("#" + dieNum + "p1").css("visibility", "visible");
        $("#" + dieNum + "p7").css("visibility", "visible");
    } else if (roll == 3) {
        $("#" + dieNum + "p1").css("visibility", "visible");
        $("#" + dieNum + "p4").css("visibility", "visible");
        $("#" + dieNum + "p7").css("visibility", "visible");
    } else if (roll == 4) {
        $("#" + dieNum + "p1").css("visibility", "visible");
        $("#" + dieNum + "p3").css("visibility", "visible");
        $("#" + dieNum + "p5").css("visibility", "visible");
        $("#" + dieNum + "p7").css("visibility", "visible");
    } else if (roll == 5) {
        $("#" + dieNum + "p1").css("visibility", "visible");
        $("#" + dieNum + "p3").css("visibility", "visible");
        $("#" + dieNum + "p4").css("visibility", "visible");
        $("#" + dieNum + "p5").css("visibility", "visible");
        $("#" + dieNum + "p7").css("visibility", "visible");
    } else  { // roll == 6
        $("#" + dieNum + "p1").css("visibility", "visible");
        $("#" + dieNum + "p2").css("visibility", "visible");
        $("#" + dieNum + "p3").css("visibility", "visible");
        $("#" + dieNum + "p5").css("visibility", "visible");
        $("#" + dieNum + "p6").css("visibility", "visible");
        $("#" + dieNum + "p7").css("visibility", "visible");
    }

    return roll;
}