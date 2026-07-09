import os
from cryptography.hazmat.primitives.ciphers.aead import AESGCM
key = AESGCM.generate_key(bit_length=256); aesgcm = AESGCM(key)
nonce = os.urandom(12)
plaintext = b"Dies ist eine geheime Nachricht fuer M183!"
ciphertext = aesgcm.encrypt(nonce, plaintext, None)
print(f"Klartext:        {plaintext.decode()}")
print(f"Schlüssel (hex): {key.hex()}")
print(f"Nonce (hex):     {nonce.hex()}")
print(f"Ciphertext (hex): {ciphertext.hex()}")
print(f"Ciphertext-Länge: {len(ciphertext)} Bytes\n")
print(f"Entschlüsselt:   {aesgcm.decrypt(nonce, ciphertext, None).decode()}")
tampered = bytearray(ciphertext); tampered[0] ^= 0xFF
try:
    aesgcm.decrypt(nonce, bytes(tampered), None)
except Exception as e:
    print(f"\nManipulations-Test: {e}\n→ GCM-Modus hat die Manipulation erkannt!")
