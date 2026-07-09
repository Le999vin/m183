<div align="center">

# 🛡️ Modul 183 – Applikationssicherheit implementieren

**Abgabe-Repository · KN01 – KN04**

Praktische Nachweise, Angriffsdemos und Fixes rund um Web-Application-Security –
von XSS über Session-Handling bis Kryptografie.

![Modul](https://img.shields.io/badge/Modul-M183-blue)
![Thema](https://img.shields.io/badge/Thema-Applikationssicherheit-9cf)
![OWASP](https://img.shields.io/badge/OWASP-Top%2010-red)
![Umgebung](https://img.shields.io/badge/Umgebung-AWS%20EC2%20%C2%B7%20Docker-orange)
![Fortschritt](https://img.shields.io/badge/Fortschritt-KN01--03%20dokumentiert%20%C2%B7%20KN04%20offen-yellow)

</div>

---

## 📌 Worum geht es hier?

Dieses Repository bündelt die vier Kompetenznachweise (KN01–KN04) des Moduls 183.
Jeder Nachweis besteht aus einer **offiziellen Aufgabenstellung** und einer **eigentlichen Abgabe**
mit Screenshots, Terminal-Logs, Code und schriftlichen Antworten. Alle Angriffe wurden real
auf einer eigenen **AWS-EC2-Instanz** (Docker, PHP 8.2, Python) durchgeführt und belegt.

Die Ablage trennt bewusst **Aufgabe** und **Abgabe**, damit jederzeit nachvollziehbar bleibt,
*was verlangt war* und *was tatsächlich nachgewiesen wurde*.

---

## 🧭 Inhaltsverzeichnis

- [Schnellstatus](#-schnellstatus)
- [Repository-Struktur](#-repository-struktur)
- [Die vier Kompetenznachweise](#-die-vier-kompetenznachweise)
  - [KN01 – OWASP Top 10 mit Google Gruyere](#kn01--owasp-top-10-mit-google-gruyere)
  - [KN02 – WebGoat](#kn02--webgoat)
  - [KN03 – Sessionhandling & Authentifizierung](#kn03--sessionhandling--authentifizierung)
  - [KN04 – Verschlüsselung & Kryptografie](#kn04--verschlüsselung--kryptografie)
- [Empfohlene Lesereihenfolge](#-empfohlene-lesereihenfolge)
- [Eingesetzte Tools & Umgebung](#-eingesetzte-tools--umgebung)
- [Bildlinks & Repo-Hygiene](#-bildlinks--repo-hygiene)

---

## 🚦 Schnellstatus

| KN | Thema | Status | Wichtigster offener Punkt |
|:--:|-------|:------:|---------------------------|
| **KN01** | OWASP Top 10 (Gruyere) | 🟢 Fast vollständig | B3 Cookie-Diebstahl belegt; finale Session-Übernahme & D-Admin-Elevation nicht live nachgewiesen |
| **KN02** | WebGoat | 🟢 Fachlich dokumentiert | C–F gut belegt; Setup-/SQL-Screenshots als Einzelbelege fehlen |
| **KN03** | Sessionhandling & Auth | 🟢 Gut dokumentiert | AWS-Security-Group-Screenshot (Port 80) und ggf. Videos fehlen |
| **KN04** | Kryptografie | 🔴 Nicht begonnen | Nur Aufgabenstellung vorhanden; Abgabevorlage ist angelegt |

> 📄 Der vollständige Abgleich aller Anforderungen gegen den aktuellen Ordnerstand steht in **[`ABGABE_STATUS.md`](ABGABE_STATUS.md)**.

---

## 📂 Repository-Struktur

```
m183/
├── README.md                 → Diese Übersicht
├── ABGABE_STATUS.md          → Abgleich aller Anforderungen gegen den Ordnerstand
│
├── KN-01.md … KN-04.md       → Offizielle Aufgabenstellungen / Anforderungen
│
├── KN01/                     → Abgabe: OWASP Top 10 mit Google Gruyere
│   ├── KN-01.md              → Doku Teile A, B1–B3, C, D + schriftliche Antworten
│   └── *.png                 → Screenshots (Payloads, Cookies, Terminal, Alerts)
│
├── KN02/                     → Abgabe: WebGoat
│   ├── KN-02.md              → SQLi, XSS, CSRF, IDOR, JWT + Antworten
│   └── *.png / logs / token  → Screenshots, Logs und Tokens
│
├── KN03/                     → Abgabe: Sessionhandling & Authentifizierung
│   ├── KN-03.md              → Session-Fixation-Demo, Fixes, MFA
│   ├── AufgabeSource/
│   │   ├── index_original.php→ Verwundbare Originalversion
│   │   └── index.php         → Gepatchte Version
│   └── *.png / *.txt         → Screenshots + Fix-Verifikation
│
├── KN04/                     → Abgabe (Vorlage): Kryptografie
│   └── KN-04.md              → Strukturierte Vorlage, noch keine Nachweise
│
├── Abgaben.md                → Lokale Zielseite für Links aus den Aufgaben
└── EC2-Setup.md              → Lokale Zielseite für Links aus den Aufgaben
```

| Bereich | Bedeutung |
|---------|-----------|
| `KN-01.md` … `KN-04.md` | Offizielle Aufgabenstellungen / Anforderungen |
| `KN0X/KN-0X.md` | Eigentliche Abgabe mit Screenshots, Logs, Code und Antworten |
| `ABGABE_STATUS.md` | Abgleich aller KN01–KN04-Anforderungen gegen den aktuellen Ordnerstand |
| `Abgaben.md` / `EC2-Setup.md` | Lokale Zielseiten für Links aus den Aufgabenstellungen |

---

## 🎯 Die vier Kompetenznachweise

### KN01 – OWASP Top 10 mit Google Gruyere

> **Ziel:** Zwei Accounts erstellen und **Stored XSS** (DOM-Manipulation, Cookie-Diebstahl,
> Session-Hijacking), **Reflected XSS** sowie **Client-State-Manipulation** in Google Gruyere nachweisen.

| Teil | Inhalt | Status |
|:----:|--------|:------:|
| A | Gruyere starten, Angreifer- & Verteidiger-Account anlegen | ✅ |
| B1 | Stored XSS als DOM-Manipulation (`<img onerror=…>`-Filter-Bypass) | ✅ |
| B2 | Cookies sichtbar machen via `document.cookie` | ✅ |
| B3 | Cookie an EC2-Angreifer-Server exfiltrieren (Python HTTP-Server + Serveo-Tunnel) | 🟡 Diebstahl bewiesen, Live-Übernahme nicht reproduzierbar |
| C | Reflected XSS über den URL-Pfad | ✅ |
| D | Client-State-Manipulation (Rolle im Cookie) | 🟡 Analyse komplett, Rechteausweitung nicht belegt |

**Kernaussage:** Alle 22 schriftlichen Fragen sind beantwortet, alle Angriffsmechanismen technisch
nachgewiesen. Die zwei offenen Punkte sind transparent inkl. Erklärung und korrektem Lösungsweg
dokumentiert. 📎 **[Zur Abgabe →](KN01/KN-01.md)**

---

### KN02 – WebGoat

> **Ziel:** Die klassischen Web-Schwachstellen in WebGoat (Port 8080, AWS EC2) praktisch durchspielen.

| Teil | Inhalt | Status |
|:----:|--------|:------:|
| A | WebGoat starten, Account, Security Group Port 8080 | 🟡 Startseiten-/SG-Screenshot fehlt als Einzelbeleg |
| B | **SQL Injection** (Login Bypass, Query Chaining) | 🟡 SQLi ausführlich; einzelne Bild-Belege fehlen |
| C | **XSS** (Stored, DOM, Reflected) | ✅ |
| D | **CSRF** | ✅ |
| E | **IDOR** (fremdes Profil, PUT-Response) | ✅ |
| F | **JWT** (`alg:none`-Token via jwt.io) | ✅ |

📎 **[Zur Abgabe →](KN02/KN-02.md)**

---

### KN03 – Sessionhandling & Authentifizierung

> **Ziel:** Eine verwundbare PHP-App analysieren, einen **Session-Fixation-Angriff** demonstrieren
> und die Lücken sauber fixen.
> **Umgebung:** PHP 8.2 Apache Docker-Container auf AWS EC2, Port 80.

| Teil | Inhalt | Status |
|:----:|--------|:------:|
| A | App deployen, Port 80 freigeben | ✅ (AWS-GUI-Screenshot offen) |
| B | Fünf Sicherheitslücken in `index.php` analysieren | ✅ |
| C | Session-Fixation live demonstrieren (gleiche `PHPSESSID` in zwei Browsern) | ✅ |
| D | Fixes: `session_regenerate_id(true)`, **Argon2ID**, Cookie-Flags (`HttpOnly`/`Secure`/`SameSite=Strict`) | ✅ |
| E | MFA-Faktoren erklären (Wissen / Besitz / Inhärenz / Ort) | ✅ |

**Highlight:** Vorher/Nachher-Code liegt in `AufgabeSource/` (`index_original.php` ↔ `index.php`),
verifiziert per `php -l`, `Set-Cookie`-Header und Login-Test. 📎 **[Zur Abgabe →](KN03/KN-03.md)**

---

### KN04 – Verschlüsselung & Kryptografie

> **Status:** 🔴 Noch nicht bearbeitet. `KN04/KN-04.md` ist als **saubere Abgabevorlage** angelegt,
> damit beim Bearbeiten keine Screenshots oder Antworten vergessen gehen.

| Teil | Thema |
|:----:|-------|
| A | Brute-Force-Angriff auf ein Web-Login |
| B | AES-256-GCM symmetrische Verschlüsselung |
| C | PKI-Zertifikatskette mit OpenSSL |
| D | Nginx mit TLS konfigurieren |
| E | HTTP vs. HTTPS – Traffic live mitlesen (`nmap`, `tcpdump`) |
| F | Hash-Funktionen – MD5 cracken & MD5 vs. scrypt vergleichen |

📎 **[Zur Vorlage →](KN04/KN-04.md)**

---

## 📖 Empfohlene Lesereihenfolge

1. **[`ABGABE_STATUS.md`](ABGABE_STATUS.md)** lesen – Gesamtüberblick und Risikoeinschätzung.
2. Danach die Abgaben in **`KN01/` → `KN02/` → `KN03/` → `KN04/`** prüfen.
3. Fehlende Screenshots/Videos gezielt nachreichen, statt bestehende Dokus umzubauen.

---

## 🧰 Eingesetzte Tools & Umgebung

| Kategorie | Eingesetzt |
|-----------|-----------|
| **Ziel-Apps** | Google Gruyere, WebGoat, verwundbare PHP-App |
| **Infrastruktur** | AWS EC2, Security Groups, Docker |
| **Angriff / Tunnel** | Python `http.server`, Serveo (`ssh -R`), DevTools, jwt.io |
| **Server / Sprachen** | PHP 8.2 + Apache, Bash, Python |
| **Security-Bezug** | OWASP Top 10 (2025), OWASP Proactive Controls, Argon2ID, MFA |

---

## 🖼️ Bildlinks & 🧹 Repo-Hygiene

**Bildlinks:** Alle Markdown-Dateien nutzen **relative** Bildpfade. Die Bilder liegen jeweils im
selben KN-Ordner wie die zugehörige Abgabe-Datei, damit sie in Markdown-Preview, GitHub/GitLab
und Obsidian gleichermassen sichtbar bleiben. *(KN04 enthält noch keine Bilder – dort fehlen die Nachweise.)*

**Repo-Hygiene:** Generierte lokale Dateien (`.DS_Store`, `.playwright-cli/`, Env-Dateien,
Handoff-Notizen) werden per `.gitignore` ausgeschlossen. Abgaberelevante Markdown-Dateien,
Screenshots, Logs und Quellcode bleiben versioniert.

---

<div align="center">

*Modul 183 · Applikationssicherheit implementieren · Abgabe KN01–KN04*

</div>
