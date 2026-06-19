# Modul 183 - Applikationssicherheit

## Block 05 - 19.06.2026

### Geplant
- EC2 Instanz aufsetzen
- Git Repository einrichten
- KN01 starten (XSS, CSRF, Client-State Manipulation)

### Umgesetzt
- AWS EC2 Ubuntu 26.04 Instanz erstellt (m183-ubuntu)
- SSH Verbindung hergestellt
- Git konfiguriert und Repo geklont

### Probleme
- Keine

## KN01 - XSS Übungen

### Reflected XSS
- URL Parameter `?uid=<script>alert(1)</script>` ausgeführt
- Alert mit "1" erschienen → Reflected XSS erfolgreich

### Stored XSS
- Payload `<a onmouseover="alert('XSS')">hover me</a>` als Snippet gespeichert
- Alert erscheint bei jedem Besucher → Stored XSS erfolgreich

### Client-State Manipulation (Elevation of Privilege)
- Gruyere Cookie Format: `ID|username|rolle`
- Mit `saveprofile?action=update&is_admin=True` Admin-Rechte erlangt
- "Manage this server" Link erschien → Admin-Zugriff erfolgreich
- Schwachstelle: Server validiert Client-Daten nicht serverseitig
