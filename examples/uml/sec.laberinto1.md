# Laberinto

Especifica el diagrama de secuencia para la siguiente operación

```java
public class JuegoLaberinto {
    public Laberinto crearLaberinto () {
        Laberinto lab = new Laberinto();
        Habitacion h1 = new Habitacion();
        Habitacion h2 = new Habitacion();
        Puerta puerta = new Puerta(h1, h2);
        lab.addHabitacion(h1);
        lab.addHabitacion(h2);
        h1.addPuerta(puerta);
        return lab;
    }
}
```

```plantuml
@startuml
actor Máquina
participant JuegoLaberinto 
Máquina -> JuegoLaberinto: "crearLaberinto()"
activate JuegoLaberinto
create Laberinto as "lab: Laberinto" 
JuegoLaberinto -> Laberinto: "new"
create Hab1 as "h1: Hab" 
JuegoLaberinto -> Hab1: "new"
create Hab2 as "h2: Hab" 
JuegoLaberinto -> Hab2: "new"
create Puerta as "puerta: Puerta" 
JuegoLaberinto -> Puerta: "new(h1,h2)"
JuegoLaberinto -> Laberinto : "addHabitacion(h1)"
activate Laberinto
JuegoLaberinto -> Laberinto : "addHabitacion(h2)"
deactivate Laberinto
JuegoLaberinto -> Hab1: "addPuerta(puerta)"
activate Hab1
@enduml
```
