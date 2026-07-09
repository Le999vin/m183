import time, hashlib, os
from cryptography.hazmat.primitives.kdf.scrypt import Scrypt
password = b"sunshine"
start = time.time()
for _ in range(1000000): hashlib.md5(password).hexdigest()
md5_per_sec = 1000000 / (time.time() - start)
print(f"MD5:    {md5_per_sec:>15,.0f} Hashes/Sekunde")
start = time.time()
for _ in range(10):
    Scrypt(salt=os.urandom(16), length=32, n=2**14, r=8, p=1).derive(password)
scrypt_per_sec = 10 / (time.time() - start)
print(f"scrypt: {scrypt_per_sec:>15,.1f} Hashes/Sekunde")
print(f"\nMD5 ist {md5_per_sec/scrypt_per_sec:,.0f}x schneller als scrypt.")
print(f"\nrockyou.txt (14 Mio. Eintraege) cracken:")
print(f"  Mit MD5:    {14000000 / md5_per_sec:.1f} Sekunden")
print(f"  Mit scrypt: {14000000 / scrypt_per_sec / 3600:.0f} Stunden")
