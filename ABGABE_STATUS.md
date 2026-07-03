# M183 Abgabestatus - Analyse KN01 bis KN04

Stand: 03.07.2026

## Gesamtbewertung

| KN | Ergebnis | Abgabe-Risiko |
|---|---|---|
| KN01 | Inhaltlich stark, viele Screenshots vorhanden | Mittel: Zwei offiziell verlangte Erfolgsnachweise fehlen |
| KN02 | Fertige Doku aus Arbeitsordner uebernommen, C-F gut belegt | Mittel: Setup-/SQL-Screenshots im aktuellen Ordner nicht eindeutig vorhanden |
| KN03 | Gute Loesungsdoku, Code und viele Nachweisbilder vorhanden | Niedrig bis mittel: GUI-Screenshot Security Group und ggf. Videos fehlen |
| KN04 | Keine echte Bearbeitung im Ordner vorhanden | Hoch: Muss noch praktisch geloest werden |

---

## KN01 - OWASP Top 10 Gruyere

Abgabe-Datei: `KN01/KN-01.md`

| Teil | Auftrag | Status | Bemerkung |
|---|---|---|---|
| A | Gruyere starten, zwei Accounts erstellen | Erfuellt | Screenshots 01-03 vorhanden |
| B1 | Stored XSS DOM-Manipulation | Erfuellt | Payload und Angreifer-/Verteidiger-Screenshots vorhanden |
| B2 | Cookies sichtbar machen | Erfuellt | DevTools und beide Cookie-Kontexte dokumentiert |
| B3 | Cookie exfiltrieren und Session uebernehmen | Teilweise | Exfiltration ist belegt; finale Uebernahme als Verteidiger ist laut Doku fehlgeschlagen |
| C | Reflected XSS | Erfuellt | Reflection, HTML-Injection, Alert, Network-Beleg vorhanden |
| D | Client-State Manipulation | Teilweise | Cookie-Manipulation dokumentiert; erfolgreiche Admin-Rechte nicht belegt |

Offene Nachweise fuer eine perfekte KN01-Abgabe:

- B3: Screenshot nach erfolgreicher Session-Uebernahme, bei dem der Angreifer als `verteidiger-levin` eingeloggt ist.
- D: Screenshot nach erfolgreicher Rechteerhoehung/Admin-Funktion, nicht nur der manipulierte Cookie-Wert.

---

## KN02 - WebGoat

Abgabe-Datei: `KN02/KN-02.md`

| Teil | Auftrag | Status | Bemerkung |
|---|---|---|---|
| A | WebGoat starten, Port 8080, Account | Teilweise belegt | Technisch beschrieben; eindeutiger WebGoat-Startseiten- und Security-Group-Screenshot fehlt im aktuellen Ordner |
| B | SQL Injection | Teilweise belegt | SQL-Intro sehr ausfuehrlich dokumentiert; offiziell verlangte Screenshots Login Bypass/Query Chaining fehlen als Bilddateien |
| C | XSS | Erfuellt | Live-Status, Stored-XSS und DOM/Reflected-XSS beschrieben, Screenshots vorhanden |
| D | CSRF | Erfuellt | HTML-/Request-Logik und WebGoat-Status dokumentiert, Screenshots vorhanden |
| E | IDOR | Erfuellt | Fremdes Profil, PUT-Response und Antworten dokumentiert |
| F | JWT | Erfuellt | jwt.io, alg-none-Token, Response und Quiz dokumentiert |

Offene Nachweise fuer eine perfekte KN02-Abgabe:

- A: Screenshot WebGoat-Startseite mit sichtbarer EC2-IP.
- A: Screenshot Security Group Port 8080 mit `My IP`.
- B: Screenshot Login Bypass mit Payload und gruener WebGoat-Bestaetigung.
- B: Screenshot Query Chaining / Integrity-Aufgabe mit Payload und Ergebnis.

---

## KN03 - Sessionhandling und Authentifizierung

Abgabe-Datei: `KN03/KN-03.md`

| Teil | Auftrag | Status | Bemerkung |
|---|---|---|---|
| A | Security Group Port 80, App deployen | Teilweise belegt | App-Screenshot vorhanden; AWS-GUI-Screenshot Security Group fehlt |
| B | Fuenf Sicherheitsluecken analysieren | Erfuellt | Tabelle mit fuenf Luecken vorhanden |
| C | Session-Fixation demonstrieren | Erfuellt | Zwei-Browser-Nachweis mit gleicher `PHPSESSID` vorhanden |
| D | Fixes implementieren | Erfuellt | Code, Browser-Screenshots, `php -l` und `Set-Cookie`-Header dokumentiert |
| E | MFA-Faktoren erklaeren | Erfuellt | Tabelle und Antworten vorhanden |

Offene Nachweise fuer eine perfekte KN03-Abgabe:

- Screenshot AWS Security Group mit Port 80 / `My IP`.
- Falls streng verlangt: Video der Cookie-Flags vorher/nachher.
- Falls streng verlangt: Video mit falschem und richtigem Passwort nach Fix.

---

## KN04 - Verschluesselung und Kryptographie

Abgabe-Datei: `KN04/KN-04.md`

| Teil | Auftrag | Status | Bemerkung |
|---|---|---|---|
| A | Brute-Force gegen Login-App | Offen | Noch keine Screenshots oder Resultate |
| B | AES-256-GCM Demo | Offen | Noch keine Script-Ausgabe |
| C | PKI-Zertifikatskette mit OpenSSL | Offen | Noch keine Zertifikate/Verify-Ausgabe |
| D | Nginx mit TLS | Offen | Noch keine Browser-/Zertifikat-Screenshots |
| E | HTTP vs HTTPS mit nmap/tcpdump | Offen | Noch keine Terminal-Nachweise |
| F | MD5 cracken und MD5 vs scrypt vergleichen | Offen | Noch keine Python-Ausgaben |

KN04 ist aktuell nicht abgabefertig. Die Datei `KN04/KN-04.md` ist bewusst als saubere Vorlage angelegt, damit die praktische Bearbeitung direkt strukturiert dokumentiert werden kann.

---

## Bildlink-Pruefung

Die verwendeten relativen Bildlinks in den Abgabe-Dateien zeigen auf vorhandene Dateien im jeweiligen KN-Ordner. KN04 enthaelt noch keine Bilder, weil noch keine Nachweise vorhanden sind.
