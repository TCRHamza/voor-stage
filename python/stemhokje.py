kiesgerechtigde_leeftijd = 18

stemgerechtigd = False

leeftijd = int(input("Voer uw leeftijd in: "))

if leeftijd >= kiesgerechtigde_leeftijd:
    stemgerechtigd = True

if stemgerechtigd:
    print("U bent stemgerechtigd! U kunt uw stem uitbrengen.")
else:
    print("U bent nog niet stemgerechtigd. U kunt nog niet stemmen.")
