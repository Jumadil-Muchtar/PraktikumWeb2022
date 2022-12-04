var nama = prompt("Masukkan Nama Anda");
nama = nama.trim();

if (nama == "") {
    console.log("Masukkan Nama Anda terlebih dahulu")
} else {
    var anime = prompt("Apakah anda menonton anime? YES or NO")
    if (anime == "YES") {
        var banyak = prompt("Sudah berapa banyak anime yang anda tonton?")
        banyak = parseInt(banyak);

        if (banyak) {
            if (banyak > 10) {
                console.log("Wah Ternyata " + nama + " Wibu Akut")
            } else if (banyak > 5) {
                console.log("Ayoo " + nama + " Semangat biar jadi wibu akut")
            } else {
                console.log("Wah si " + nama + " Baru memulai karirnya sebagai Wibu Akut")
            }
        } else {
            console.log("Masukkan hanya menerima angka")
        }
    } else if (anime == "NO") {
        console.log("HEY " + nama + " Ayo nonton anime tahun 2022 Season ini bagus bagus loh animenya seperti Bleach")
    } else {
        console.log("Masukkan hanya menerima YES atau NO")
    }
}