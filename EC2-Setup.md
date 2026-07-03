# EC2-Setup Kurzreferenz

Diese Datei ist die lokale Zielseite fuer die Aufgabenlinks. Sie ersetzt keine AWS-Konsole-Screenshots, sondern dokumentiert die Basisannahmen fuer KN01 bis KN04.

## Basis

- Ubuntu-EC2-Instanz starten.
- Per SSH verbinden.
- Docker installieren und starten.
- Security-Group-Regeln nur fuer `My IP` oeffnen.

## Docker installieren

```bash
sudo apt update
sudo apt install -y docker.io
sudo systemctl enable --now docker
sudo usermod -aG docker "$USER"
```

Nach `usermod` einmal neu einloggen.

## Ports pro Aufgabe

| Aufgabe | Zweck | Port |
|---|---|---:|
| KN01 B3 | Cookie-Exfiltration-Testserver | 9000 |
| KN02 | WebGoat | 8080 |
| KN03 | PHP-Apache-App | 80 |
| KN04 | HTTPS/Nginx | 443 |

## Wichtige Nachweise

- Security Group mit passendem Port und Quelle `My IP`.
- Laufender Container mit `docker ps`.
- Browseraufruf ueber die EC2-IP.
- Falls TLS genutzt wird: Zertifikatsdetails und HTTPS-Aufruf dokumentieren.
