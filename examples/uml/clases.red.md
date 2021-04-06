# Red de ordenadores

Describe redes de ordenadores:

- se pueden incluir: Servidor, PC, Impresora, Hub, Cable de red
- Los pcs se pueden conectar a un único Hub, los servidores con uno o varios
- Los servidores y pcs pueden generar mensajes con cierta longitud
- Los hubs tienen un número de puertos, algunos de los cuales pueden usarse para conectar con otros hubs. Tiene probabilidad de perder mensajes
- Las impresoras pueden averiarse, con ciert probab. durante cierto tiempo.

```plantuml
@startuml
hide empty members
skinparam linetype ortho
class Red
class Hub
abstract class Equipo
abstract class Cable
abstract class Puerto
class Mensaje {
    - longitud: int
}
abstract class EquipoMensajero extends Equipo
class Impresora extends Equipo {
    - probAveria: double
    - tiempoAveria: double
}
class CableEquipo extends Cable
class CableHub extends Cable
class PuertoEquipo extends Puerto
class PuertoHub extends Puerto
class Servidor extends EquipoMensajero
class PC extends EquipoMensajero
' relaciones

Red "1" *--> "*" Equipo
Red "1" *--> "*" Hub

Hub "1" *--> "*" Puerto

Equipo "1" --> CableEquipo : fuente
Mensaje "*" <-- "1" EquipoMensajero : genera

CableEquipo "1" --> "1" PuertoEquipo: destino
CableHub "1" --> "2" PuertoHub
@enduml
```
