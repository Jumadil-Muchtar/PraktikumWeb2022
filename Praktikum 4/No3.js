var str = prompt("Masukkan Kalimat");
var chars = str.split(""); // [R, E, Z, Z, A]
chars = chars.sort(); // [A, E, R, Z, Z]
var letters_count = {};

// Loop 1, i = 0, chars[0] = A
// letters_count = {A = 1}

// Loop 5, i = 4, chars[4] = Z
// letters_count = {A = 1, E = 1, ... Z = 2 }

//split
for (let i = 0; i < chars.length; i++) {
    if (letters_count[chars[i]] == undefined) {
        letters_count[chars[i]] = 0;
    }
    letters_count[chars[i]]++;

}

// letters_count = {A = 1, E = 1, R = 1, Z = 2}

for (let i in letters_count) {
    if (i === " ") {
        console.log("space" + " = " + letters_count[i]);
    } else {
        console.log(i + " = " + letters_count[i]);
    }
} 