[![Version](https://img.shields.io/badge/Symcon-PHPModul-red.svg)](https://www.symcon.de/service/dokumentation/entwicklerbereich/sdk-tools/sdk-php/)
![Version](https://img.shields.io/badge/Symcon%20Version-7.0%20%3E-blue.svg)
[![License](https://img.shields.io/badge/License-CC%20BY--NC--SA%204.0-green.svg)](https://creativecommons.org/licenses/by-nc-sa/4.0/)
[![Check Style](https://github.com/Schnittcher/INSTARMQTT/workflows/Check%20Style/badge.svg)](https://github.com/Schnittcher/IPS-Shelly/actions)

# INSTARMQTT
   Mit diesem Modul ist es möglich die INSTAR Kamera´s in IP-Symcon einzubinden.
 
## Inhaltverzeichnis
- [INSTARMQTT](#instarmqtt)
	- [Inhaltverzeichnis](#inhaltverzeichnis)
	- [1. Voraussetzungen](#1-voraussetzungen)
		- [1.1 Aktiviertes MQTT Protokoll](#11-aktiviertes-mqtt-protokoll)
	- [2. Enthaltene Module](#2-enthaltene-module)
	- [3. Installation](#3-installation)
	- [4. Konfiguration in IP-Symcon](#4-konfiguration-in-ip-symcon)
	- [5. Spenden](#5-spenden)
	- [6. Lizenz](#6-lizenz)
   
## 1. Voraussetzungen

* mindestens IPS Version 7.0
* Aktiviertes MQTT Protokoll in der Kamera Gerät
* MQTT Server oder MQTT Client

### 1.1 Aktiviertes MQTT Protokoll
Das MQTT Protokoll muss innerhalb der INSTAR Kamera eingerichtet werden.
Es gibt zwei Möglichkeiten, die Kamera kann sich mit einem externen MQTT Broker verbinden, oder aber ihren eigenen Broker nutzen.
Sollte die Kamera ihren eigenen Broker nutzren, muss in Symcon der Konfigurator mit einem MQTT Client als Gateway ausgestattet werden, welcher sich mit der Kamera verbindet, andernfalls kann der interne MQTT Server von Symcon genutzt werden, dann muss die Kamera sich mit dem MQTT Server von Symcon verbinden.

## 2. Enthaltene Module

* [Alarm](Alarm/README.md)
* [Camera](Camera/README.md)
* [Configurator](Configurator/README.md)
* [Features](Features/README.md)
* [Network](Network/README.md)
* [System](System/README.md)

## 3. Installation
Installation über den IP-Symcon Module Store.

## 4. Konfiguration in IP-Symcon
Bitte den Konfigurator anlegen und die weitere Doku den einzelnen Instanzen entnehmen.

## 5. Spenden

Dieses Modul ist für die nicht kommerzielle Nutzung kostenlos, Schenkungen als Unterstützung für den Autor werden hier akzeptiert:    

<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=EK4JRP87XLSHW" target="_blank"><img src="https://www.paypalobjects.com/de_DE/DE/i/btn/btn_donate_LG.gif" border="0" /></a> <a href="https://www.amazon.de/hz/wishlist/ls/3JVWED9SZMDPK?ref_=wl_share" target="_blank">Amazon Wunschzettel</a>

## 6. Lizenz

[CC BY-NC-SA 4.0](https://creativecommons.org/licenses/by-nc-sa/4.0/)