# Configurator
   Der Configurator dient dazu die Kameras hinzuzufügen, um die einzelnen Instanzen zu erstellen.

### Inhaltsverzeichnis

- [Configurator](#configurator)
    - [Inhaltsverzeichnis](#inhaltsverzeichnis)
    - [1. Funktionsumfang](#1-funktionsumfang)
    - [2. Voraussetzungen](#2-voraussetzungen)
    - [3. Software-Installation](#3-software-installation)
    - [4. Einrichten der Instanzen in IP-Symcon](#4-einrichten-der-instanzen-in-ip-symcon)

### 1. Funktionsumfang

* Hinzufügen der Kameras zum Konfigurator
* Anlegen der einzelnen Geräteinstanzen

### 2. Voraussetzungen

- IP-Symcon ab Version 6.0
- MQTT in den Einstellungen der Kamera muss aktiviert sein

### 3. Software-Installation

* Über den Module Store das 'INSTARMQTT'-Modul installieren.

### 4. Einrichten der Instanzen in IP-Symcon

 Unter 'Instanz hinzufügen' kann das 'INSTARMQTT'-Modul mithilfe des Schnellfilters gefunden werden.  
	- Weitere Informationen zum Hinzufügen von Instanzen in der [Dokumentation der Instanzen](https://www.symcon.de/service/dokumentation/konzepte/instanzen/#Instanz_hinzufügen)

__Konfigurationsseite__:

Name     | Beschreibung
-------- | ------------------
Host         | HIer wird der Hostname oder die IP-Adresse der INSTAR Kamera hinterlegt.
Username | Der Username für den Login muss hier hinterlegt werden.
Passwort | Das Passwort für den Login muss hier hinterlegt werden.
Hinzufügen | Fügt die Kamera der Liste hinzu.
Lösche selektierten Eintrag | Löscht den Eintrag, welcher in der darunter stehenden Liste markiert ist.
Konfigurator | Über diese Liste können die einzelnen Geräteinstanzen zu den jeweiligen Kameras angelegt werden.