let element = document.getElementById("paragraaf");

let budget = 100;
let product = 60;

if (budget > 60) {
    element.innerHTML = "U heeft genoeg geld!";
    element.style.color = "green";
} else if (budget < 60) {
    element.innerHTML = "Helaas, te weinig geldt";
    element.style.color = "red";
} 