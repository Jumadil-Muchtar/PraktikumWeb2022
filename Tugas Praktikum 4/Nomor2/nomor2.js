// Nomor 2

// Faktorial + Faktorial
var input1 = prompt("Masukkan angka yang ingin dicari faktorialnya!");
if (Number.isInteger(Number(input1)) && input1.indexOf(' ') == -1) {
    var input2 = prompt("Ingin dijumlahkan dengan faktorial apa?");
    if(Number.isInteger(Number(input2)) && input2.indexOf(' ') == -1){
        var jumlah = 0;
        var faktorial = 1;
        console.log(input1+"!=");
        for(let i = input1; i >= 1; i--){
            faktorial *= i;
            console.log(i);
            if(i != 1) { 
                console.log("x");
            } else {
                console.log("=");
            }
        }
        console.log(faktorial);  
        jumlah+=faktorial; 
        faktorial = 1;

        console.log("");

        console.log(input2+"!=");
        for(let i = input2; i >= 1; i--){
            faktorial *= i;
            console.log(i);
            if(i != 1) { 
                console.log("x");
            } else {
                console.log("=");
            }
        }  
        console.log(faktorial);  
        jumlah+=faktorial;   
        
        console.log("");

        console.log("Hasil penjumlahan kedua faktorial:",jumlah);

    } else {
        console.log("Input 2 bukan integer atau terdapat white space!");
    }
} else {
    console.log("Input 1 bukan integer atau terdapat white space!");
}

//   NEW TEST CODE
// var input1 = prompt("Masukkan angka yang ingin dicari faktorialnya!");
// if(typeof input1 == 'number' && !isNaN(input1)){
//     // check if it is integer
//     if (Number.isInteger(input1)) {
//         console.log(input1,'is integer.');
//     }
//     else {
//         console.log(input1,'is a float value.');
//     }

// } else {
//     console.log(input1,'is not a number.');
// }

// Pekalian
// var input1 = prompt("Masukkan angka");
// input1 = parseInt(input1);
// if (Number.isInteger(parseInt(input1))){
//     var input2 = prompt("Ingin dikalikan sampai berapa?");
//     if(Number.isInteger(parseInt(input2))){
//         var jumlah = 0;
//         for(var i = 1; i < input2+1; i++){
//             console.log(input1+' x '+i+' = '+input1*i);
//             jumlah += input1*i;
//         }        
//         console.log("Hasil seluruh perkalan:",jumlah);
//     } else {
//         console.log("Input bukan Angka!");
//     }
// } else {
//     console.log("Input bukan Angka!");
// }