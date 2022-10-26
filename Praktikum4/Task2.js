var n = parseInt(prompt("Enter a number"));
var total = 0;
if (!isNaN(n)) {
    var range = parseInt(prompt("Enter the range"));
    if (!isNaN(range)) {
        for (let i = 0; i <= range; i++) {
            let sum = (n * range);
            console.log(i + " x " + n + " = " + (i * n));
            total += sum;
        }
        console.log("The total of all multiplications: " + total);
    } else {
        console.log("Input number only")
    }
} else {
    console.log("Input number only")
}