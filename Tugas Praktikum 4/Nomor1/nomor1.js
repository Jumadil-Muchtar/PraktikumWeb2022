// Nomor 1
var input1 = prompt("Masukkan nama Anda");
if (input1.trim().length === 0){
    console.log("Masukkan nama Anda terlebih dahulu!");
} else {
    var input2 = prompt("Apakah sudah memilih barang yang ingin Anda beli? YES/NO");
    if(input2 == "YES"){
        var input3 = prompt("Apakah Anda ingin membayar sekarang? YES/NO");
        if (input3 == "YES"){
            var input4 = prompt("Apakah Anda sudah membayar? YES/NO");
            if (input4 == "YES"){
                console.log("Terima kasih telah berbelanja di sini, datang lagi ya, Kak",input1+"!");
            } else if (input4 == "NO"){
                console.log("Silakan membayar terlebih dahulu, Kak",input1+"!");
            } else {
                console.log("Masukkan input yang benar, yaitu YES/NO!");
            }
        } else if (input3 == "NO"){
            console.log("Tolong pindah dari antrean dulu ya, Kak",input1+"!");
        } else {
            console.log("Masukkan input yang benar, yaitu YES/NO!");
        }
    } else if(input2 == "NO"){
        console.log("Silakan memilih barang terlebih dahulu, Kak",input1+"!");
    } else {
        console.log("Masukkan input yang benar, yaitu YES/NO!");
    }
}