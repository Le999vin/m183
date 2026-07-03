# M183 Abgabe - Struktur und Status

Diese Ablage trennt Aufgabenstellungen und eigentliche Abgaben:

| Bereich | Bedeutung |
|---|---|
| `KN-01.md` bis `KN-04.md` | Offizielle Aufgabenstellungen / Anforderungen |
| `KN01/KN-01.md` | Eigentliche KN01-Abgabe mit Screenshots |
| `KN02/KN-02.md` | Eigentliche KN02-Abgabe mit Screenshots, Logs und Tokens |
| `KN03/KN-03.md` | Eigentliche KN03-Abgabe mit Code, Screenshots und Verifikation |
| `KN04/KN-04.md` | Strukturierte KN04-Abgabevorlage, weil noch keine Nachweise vorhanden sind |
| `ABGABE_STATUS.md` | Abgleich aller KN01-KN04-Anforderungen gegen den aktuellen Ordnerstand |
| `Abgaben.md` / `EC2-Setup.md` | Lokale Zielseiten fuer Links aus den Aufgabenstellungen |

## Schnellstatus

| KN | Status | Wichtigster Punkt |
|---|---|---|
| KN01 | Fast vollstaendig | B3 Cookie-Diebstahl belegt; finale Session-Uebernahme und D-Admin-Elevation nicht erfolgreich nachgewiesen |
| KN02 | Fachlich dokumentiert | C-F gut belegt; Setup-/SQL-Screenshots fehlen im aktuellen Ordner als eindeutige Einzelbelege |
| KN03 | Fachlich gut dokumentiert | Mehr Screenshots ergaenzt; Security-Group-Screenshot und ggf. Videos fehlen noch |
| KN04 | Nicht begonnen | Es gibt bisher nur die Aufgabenstellung; Abgabevorlage wurde angelegt |

## Empfohlene Lesereihenfolge

1. `ABGABE_STATUS.md` lesen.
2. Danach die Abgaben in `KN01/`, `KN02/`, `KN03/`, `KN04/` pruefen.
3. Fehlende Screenshots/Videos gezielt nachreichen, statt die bestehenden Dokumentationen umzubauen.

## Bildlinks

Die Markdown-Dateien verwenden relative Bildlinks. Die Bilder liegen jeweils im gleichen KN-Ordner wie die Abgabe-Datei, damit sie in Markdown-Preview, GitHub/GitLab und Obsidian sichtbar bleiben.

## Repo-Hygiene

Generierte lokale Dateien wie `.DS_Store`, `.playwright-cli/`, Env-Dateien und Handoff-Notizen werden per `.gitignore` ausgeschlossen. Abgaberelevante Markdown-Dateien, Screenshots, Logs und Quellcode bleiben versioniert.
