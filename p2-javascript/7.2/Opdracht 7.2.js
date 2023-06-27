let getal = 0;

function fuckthis() {
    console.log("Onlick ran, getal: " + getal);
    getal++;
    if (getal > 10) {
        getal = 0;
    }
    getal.innerHTML = getal;
    console.log("getal after run: " + getal);
    screen_num.innerHTML = getal;
}