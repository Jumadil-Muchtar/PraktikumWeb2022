const nama = prompt("Masukkan Nama Anda");

if (!nama) {
    console.log("Masukkan nama anda terlebih dahulu");
} else {
    const sudah = prompt("Apakah sudah mengumpulkan tugas praktikum?YES atau NO");
    if (sudah == "YES" || sudah == "yes") {
        const asistensi = prompt ("Ikut asistensi? YES atau NO");
        switch (asistensi) {
            case "YES":
                const asistensi1 = prompt("Sudah berapa kali Asistensi? 1 Atau 2");
                switch (asistensi1) {
                    case "1":
                        console.log("Asistensi sekali lagi ya " + nama);
                        break;
                    case "2":
                        console.log("Hebat kamu saya kasih subscribe " + nama);
                        break;
                    default:
                        console.log("Masukkan input yang benar yaitu 1 atau 2")
                } 
                break;
            case "NO":
                console.log("Jangan lupa dikerja tugas praktikumnya " + nama)
                break;
            default:
                console.log("Masukkan input yang benar yaitu 1 atau 2")
            }
    } else if (sudah == "no" || sudah == "NO") {
        console.log("Jangan lupa dikerja tugas praktikumnya " + nama);
    } else {
        console.log("Masukkan Input YES or NO");
    }
}               

