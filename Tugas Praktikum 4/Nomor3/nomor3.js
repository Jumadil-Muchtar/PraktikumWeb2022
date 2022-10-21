// Nomor 3
var input = prompt("Masukkan kalimat!");
var arrayInput = input.split("");
var char = new Array();
var jumlahchar = new Array();
console.log(arrayInput);

// Cek tiap input
for(let i = 0; i < arrayInput.length; i++){
    // Cek apakah elemen sudah ada dalam array char
    if(char.includes(arrayInput[i])){
        let index = char.indexOf(arrayInput[i]);
        jumlahchar[index]++;
    } else {
        char.push(arrayInput[i]);
        jumlahchar.push(1);
    }
}

for(let i = 0; i < char.length; i++){
    console.log(char[i],'=',jumlahchar[i]);
}


// var char = [["a",0],["b",0],["c",0],["d",0],["e",0],["f",0],["g",0],["h",0],["i",0],["j",0],
// ["k",0],["l",0],["m",0],["n",0],["o",0],["p",0],["q",0],["r",0],["s",0],["t",0],
// ["u",0],["v",0],["w",0],["x",0],["y",0],["z",0],["1",0],["2",0],["3",0],["4",0],
// ["5",0],["6",0],["7",0],["8",0],["9",0],["0",0],["`",0],["~",0],["!",0],["@",0],
// ["#",0],["$",0],["%",0],["^",0],["&",0],["*",0],["(",0],[")",0],["-",0],["_",0],
// ["=",0],["+",0],["[",0],["{",0],["]",0],["}",0],["\\",0],["|",0],[";",0],[":",0],
// ["'",0],['"',0],[",",0],["<",0],[".",0],[">",0],["/",0],["?",0],[" ",0]];

// var arrayInput = input.split("");
// console.log(arrayInput);

// for (var i = 0; i < arrayInput.length; i++) {
//     for (var j = 0; j < char.length; j++) {
//         if (arrayInput[i].toLowerCase() == char[j][0]) {
//             char[j][1]++;
//         }
//     }
// }

// for (var i = 0; i < char.length; i++) {
//     if (char[i][1] != 0) {
//         if (char[i][0] == " "){
//             console.log("spasi =",char[i][1]);
//         } else {
//             console.log(char[i][0],"=",char[i][1]);
//         }
//     }
// }