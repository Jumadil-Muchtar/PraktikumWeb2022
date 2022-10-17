var kalimat = prompt("Masukkan Kalimat")
var output = kalimat.split('')
var array = []
for (let index = 0; index < output.length; index++) {
    if(output[index] == " ") {
        output[index] = "spasi"
    }
}

for (let i = 0; i < output.length; i++) {
    if (array[output[i]] == undefined) {
        array[output[i]] = 0
    }
    array[output[i]]++
}

for (let i in array) {
    console.log(i + " = " + array[i])
}