const a = prompt("Perkalian Berapa");
const b = prompt("Ingin dikali sampe berapa?");
var total = 0;
for (let i = 1; i <= b; i++) {
  // console.log(`${i} x ${a} = ${i * a}`);
  console.log(i + ' x ' + a + ' = ' + (i *a));
  total = total + i * a;
}
console.log("Hasil keseluruhan = " + total);