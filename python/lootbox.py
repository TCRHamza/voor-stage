import random

skins = ["Common", "Uncommon", "Rare", "Epic", "Legendary"]

skin_zeldzaamheid = {}

for skin in skins:
    skin_zeldzaamheid[skin] = 0

for _ in range(5):
    nieuwe_skin = random.choice(skins)
    skin_zeldzaamheid[nieuwe_skin] += 1

print("Aantal skins per zeldzaamheid:")
for skin, aantal in skin_zeldzaamheid.items():
    print(f"{skin}: {aantal}")
