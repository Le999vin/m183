import hashlib, time
HASHFILE  = "/home/ubuntu/hashes_md5.txt"
WORDLIST  = "/home/ubuntu/bruteforce-app/passwords.txt"
targets = {}
with open(HASHFILE) as f:
    for line in f:
        user, h = line.strip().split(":"); targets[h] = user
with open(WORDLIST) as f:
    passwords = [l.strip() for l in f if l.strip()]
print(f"Ziel-Hashes:  {len(targets)}\nWörterbuch:   {len(passwords)} Einträge\n{'-'*45}")
found = {}; start = time.time()
for pw in passwords:
    h = hashlib.md5(pw.encode()).hexdigest()
    if h in targets:
        user = targets[h]; found[user] = pw
        print(f"  ✓  {user:<10}  {h}  →  '{pw}'")
elapsed = time.time() - start
print(f"{'-'*45}\nGeknackt: {len(found)}/{len(targets)} | Zeit: {elapsed*1000:.1f} ms")
print(f"Hashes/Sekunde: {len(passwords)/elapsed:,.0f}")
