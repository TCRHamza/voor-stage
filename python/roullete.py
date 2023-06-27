import random

saldo = 10
getallen = list(range(1, 37))

print("Welkom bij het roulettespel! Je saldo is", saldo, "chips.")

while saldo > 0:
    inzetten = []
    
    while True:
        inzet = input("Voer het getal in waarop je wilt inzetten (1-36), of typ STOP om te spelen: ")
        
        if inzet == "STOP":
            break
        
        try:
            inzet = int(inzet)
            if inzet < 1 or inzet > 36:
                raise ValueError
            if saldo < 1:
                print("Je hebt niet genoeg chips om in te zetten.")
                break
            inzetten.append(inzet)
            saldo -= 1
        except ValueError:
            print("Ongeldige invoer. Voer een getal tussen 1 en 36 in.")
    
    if len(inzetten) == 0:
        print("Bedankt voor het spelen!")
        break
    
    print("Rien ne va plus!")
    
    winnend_getal = random.choice(getallen)
    
    print("Het winnende getal is:", winnend_getal)
    
    gewonnen_chips = inzetten.count(winnend_getal) * 35
    
    saldo += gewonnen_chips
    
    print("Je hebt", gewonnen_chips, "chips gewonnen.")
    print("Je saldo is nu", saldo, "chips.")
    
    if saldo == 0:
        print("GAME OVER")
