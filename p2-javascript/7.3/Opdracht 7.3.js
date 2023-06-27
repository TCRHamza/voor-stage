let txt = document.getElementById("txt");
let btn = document.getElementById("btn");
let count = 0;



const counter = function() {
    count += 1;
    txt.innerText = "getal = " + count;
    if ( count == 10 ) {
        count = -1
    }
} 