
var nama = prompt ("Masukkan Nama Anda");
if ( nama.trim() == ""){
    console.log("Masukkan nama anda terlebih dahulu")
}else{
var pengembalian = prompt ("Apakah anda ingin mengembalikan barang? YES atau NO?");
if (pengembalian === "NO") {
    console.log ("Baik, terima kasih sudah berbelanja di Paradise Mall " + nama);
} else if (pengembalian === "YES") {
    var day = prompt("Apakah transaksi dilakukan dalam 24 jam terakhir? YES atau NO?");
    if (day === "NO"){
        console.log("Maaf " + nama +", pengembalian barang hanya bisa dilakukan bila barang tersebut dibeli dalam 24 jam terakhir")
    } else if (day === "YES" ) {
        var reciept = prompt ("Apakah anda memiliki reciept dari transaksi? YES atau NO");
        if (reciept === "NO") {
            console.log("Maaf " + nama + ", pengembalian barang tidak dapat dilakukan tanpa recieptnya")
        } else if (reciept === "YES") {
            console.log ("Baiklah " + nama + ", silahkan ke kasir 2 untuk mengembalikan barang anda :)")
        } else {
            console.log("Masukkan input yang benar yaitu YES atau NO");
        }
    } else {
        console.log("Masukkan input yang benar yaitu YES atau NO"); 
    }
} else {
    console.log("Masukkan input yang benar yaitu YES atau NO");
}

}
