# Laberinto

Especifica el diagrama de secuencia para la siguiente operación

```java
public class JuegoLaberinto {
    private Laberinto lab;
    private boolean conVentana;

    public JuegoLaberinto() {
        lab = new Laberinto();
        conVentana = true;
    }

    public void crearLaberinto() {
        Habitacion h;
        for (int i = 0; i <10); i++){
            h = new Habitacion();
            if (conVentana) {
                h.addVentana(new Ventana());
            }
            lab.addHabitacion(h);
        }
    }
}
```

```plantuml
@startuml
actor Máquina
participant JuegoLaberinto 
participant Lab as "lab:Laberinto"
Máquina -> JuegoLaberinto : "crearLaberinto()"
activate JuegoLaberinto

    loop "[for i = 1 a 10]"
        create H as "h:Habitacion"
        JuegoLaberinto -> H

        alt "conVentana == true"
            create V as "v:Ventana"
            JuegoLaberinto -> V
            JuegoLaberinto -> H : "addVentana(v)"
        end

        JuegoLaberinto -> Lab : "addHabitacion(h)"
        activate Lab
        deactivate Lab
        deactivate JuegoLaberinto
    end
@enduml
```
