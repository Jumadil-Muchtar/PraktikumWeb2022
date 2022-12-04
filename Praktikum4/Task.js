var Name = prompt("Please Input Your Name");
Name = Name.trim();

if (Name == "") {
    console.log("Please Input You Name First!")
} else {
    var Task = prompt("Have You Done Your Task? YES or NO")
    if (Task == "YES") {
        var Much = prompt("Have You Consult the Task? And How Many Times Did You Consult? (The Input Must Be a Number, if not type in NO)")
        Much = parseInt(Much);
        if (Much >= 2) {
            console.log("Well Done! " + Name + " Now Take Some Rest, But Don't Forget To Submit Your Task!")
        } else if (Much == 1) {
            console.log("One More to Go " + Name + " Then You Deserve Your Rest")
        } else if (Much == 0 || "NO"){
            console.log("Gotta Consult it " + Name + " At Least 2 times")
        } 
    }else if (Task == "NO") {
        console.log("Then Do It! Don't Be Lazy!")
    }else {
        console.log("Please Type in YES or NO")
    }
}