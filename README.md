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
