var fibo = prompt("Sampai Bilangan Fibonacchi Keberapa?");
fibo = parseInt(fibo);
if (fibo > 0) {
    var sum = prompt("Apakah mau dijumlahkan atau dikalikan? + atau x");
    if (sum == "x" || sum == "+") {
        let n1 = 0, n2 = 1, nextTerm;
        if (sum == "+") {
            var total = 0;
        } else if (sum == "x") {
            var total = 1;
        }
        for (let i = 0; i <= fibo-2; i++) {
            if (sum == "+") {
                total += n1;
            } else if (sum == "x") {
                total *= n2;
            }
            nextTerm = n1 + n2;
            console.log(n1 + " + " + n2 + " = " + nextTerm);
            n1 = n2;
            n2 = nextTerm;
        }
        if (sum == "+") {
            console.log("Total Penjumlahan Fibo : " + (total + n2 + nextTerm))
        } else if (sum == "x") {
            console.log("Total perkalian Fibo : " + (total * n2 * nextTerm))
        }
    } else {
        console.log("Masukan hanya menerima + dan x")
    }
} else if (fibo < 1) {
    console.log("Nilai tidak boleh dibawah 1")
} else {
    console.log("Masukkan Angka bukan hal lain bebs")
}


// n = parseInt(n);
// sum = parseInt(sum);
// for (let index = 0; index < sum+1; index++) {
//     jumlah += (index*n);
//     console.log(index + " x " + n + " = " + (index * n))
// }
// console.log("Hasil Seluruh perkalian: ", jumlah-1);