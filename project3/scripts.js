fucntion getValue(id){
    return
}
function add() {
        var value1 = parseInt(document.getElementById("value1").value);
        var value2 = parseInt(document.getElementById("value2").value);

        var result = value1 + value2;

        document.getElementById("result").innerHTML = result;
}
function subtract() {
        var value1 = parseInt(document.getElementById("value1").value);
        var value2 = parseInt(document.getElementById("value2").value);

        var result = value1 - value2;

        document.getElementById("result").innerHTML = result;
}

function multpily() {
        var value1 = parseInt(document.getElementById("value1").value);
        var value2 = parseInt(document.getElementById("value2").value);

        var result = value1 * value2;

        document.getElementById("result").innerHTML = result;
}
        
function divide() {
        var value1 = parseInt(document.getElementById("value1").value);
        var value2 = parseInt(document.getElementById("value2").value);

        var result = value1 / value2;

        document.getElementById("result").innerHTML = result;
}