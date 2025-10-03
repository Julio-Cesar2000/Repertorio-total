lower = "abcdefghijklmnopqrstuvwxyz"
upper = lower.upper()

def rotated(letter, list):
    pos =list.find(letter)
    return list[pos - 13]

def rot_letter(letter):
    if letter in lower:
        return rotated(letter, lower)
    elif letter in upper:
        return rotated(letter, upper)
    else:
        return letter

def rot_text(text):
    return ''.join(rot_letter(letter) for letter in text)

print(rot_text("Olá!!!! Teste"))