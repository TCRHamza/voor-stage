def faculteit(n):
    if n == 0:
        return 1
    else:
        return n * faculteit(n - 1)

getal = int(input("Voer een positief geheel getal in: "))

if getal < 0:
    print("Fout: Voer een positief geheel getal in.")
else:
    resultaat = faculteit(getal)
    print("De faculteit van", getal, "is", resultaat)
