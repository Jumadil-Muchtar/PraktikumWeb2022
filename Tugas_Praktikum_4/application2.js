var perkalian = prompt ("Perkalian Berapa?");

var angka1 = Number(perkalian)

if (isNaN(angka1)){
    console.log("Inputan bukan Angka")
 }else{
        var akhiran = prompt ("Ingin dikalikan hingga berapa?")
        var angka2 = Number(akhiran)

        if (isNaN(angka2)){
            console.log("Inputan bukan Angka")
        } else {
            var jumlah = 0;
            for (let i=1; i<=akhiran; i++){
            var hasil = i*perkalian;
            console.log(i + " x " + perkalian + " = " + hasil);
            jumlah = hasil + jumlah;
            } console.log(jumlah)
         } 
     }