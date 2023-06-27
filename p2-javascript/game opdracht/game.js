var MyCanvas = document.getElementById("MyCanvas"); // koppeling naar Canvas
var ctx = MyCanvas.getContext("2d"); // koppelen aan 2d modus

 

// variabelen definieren
Spr1PosX = 50;
Spr1PosY = 50;
Spr1Formaat = 40;
spr2x = 200;
Spr2y =200;
spr2formaat = 40;
var ingedrukteToets = [];

setInterval(speelVeldUpdate, 5); // interval aanroep
 document.addEventListener("keydown", function (uitlezen ) {
 ingedrukteToets = ingedrukteToets || [];
 ingedrukteToets[uitlezen.keyCode] = true;
 })
 document.addEventListener("keyup", function (uitlezen); }
 ingedrukteToets[uitlezen.keyCode] = false;
 }) 

function speelVeldUpdate() {
  if (ingedrukteToets && ingedrukteToets[38]) {
    Spr1PosY--;
  }
  if (ingedrukteToets && ingedrukteToets[40]) {
    Spr1PosY++;
  }
  if (ingedrukteToets && ingedrukteToets[39]) {
    Spr1PosX++;
  }
  if (ingedrukteToets && ingedrukteToets[37]) {
    Spr1PosX--;
  }
  // aanroepen diverse functies om beeld te tekenen en voor beweging
  ctx.cleaRect(0,0 MyCanvas.offsetWidth, MyCanvas.offsetHeight);
  Spr1():
}
  
function Spr1() {
  if (Spr1PosX < 0) {
    Spr1PosX = MyCanvas.offsetWidth - Spr1Formaat;
  }
  if (Spr1PosY < 0) {
    Spr1PosY = MyCanvas.offsetHeight - Spr1Formaat;
  }
  if (Spr1PosX > MyCanvas.offsetWidth - Spr1Formaat) {
    Spr1PosX = 0;
  }
  if (Spr1PosY > MyCanvas.offsetHeight - Spr1Formaat) {
    Spr1PosY = 0;
  }
  ctx.fillStyle = "green"; // kleur toekennen
  ctx.fillRect(Spr1PosX, Spr1PosY, Spr1Formaat, Spr1Formaat); // vierkant tekenen
 
}

 

// Spr2 - schrijf sprite 2

 

function botsing() {
  // test voor botsing.
  var helftHoogteSpr1 = Spr1Formaat / 2;
  var Spr1boven = Spr1PosY - helftHoogteSpr1;
  var Spr1beneden = Spr1PosY + helftHoogteSpr1;
  var Spr1links = Spr1PosX - helftHoogteSpr1;
  var Spr1rechts = Spr1PosX + helftHoogteSpr1;
  var helftGrooteSpr2 = Spr2formaat / 2;
  var Spr2boven = Spr2y - helftGrooteSpr2;
  var Spr2beneden = Spr2y + helftGrooteSpr2;
  var Spr2links = Spr2x - helftGrooteSpr2;
  var Spr2rechts = Spr2x + helftGrooteSpr2;
 
 //test voor crash
 
 }