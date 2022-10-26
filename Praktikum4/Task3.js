var Words = prompt("Input Words");
var output = Words.split('');
var array = [];
for (let i = 0; i < output.length; i++) {
    if (array[output[i]] == undefined) {
        array[output[i]] = 0;

    }
    array[output[i]]++;

}
for (let i in array) {
    console.log(i + " = " + array[i])
}