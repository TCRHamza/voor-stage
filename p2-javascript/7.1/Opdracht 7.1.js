let budget = 100;

let product = prompt("Hoe duur is uw product? ");


if (product < budget){
    document.getElementById("tekst").style.color = "green";
    document.getElementById("tekst").textContent = "U heeft genoeg geld!";
    alert("U heeft genoeg geld!");
}
else {
    document.getElementById("tekst").style.color = "red";
    document.getElementById("tekst").textContent = "U heeft niet genoeg geld!";
    alert("U heeft niet genoeg geld!");
}