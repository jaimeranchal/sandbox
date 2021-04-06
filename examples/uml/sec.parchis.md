# Parchís

Crear el diagrama de secuencia para la operación `realizarJugada` definida en la clase **Jugador** del juego _Parchís_.

Este sería el **diagrama de clases**

```plantuml
@startuml
class Jugador {
    - casillaActual:int
    + realizarJugada():void
    + casillaActual():int
}

class Dado {
    + tirar():int
}

class Tablero {
    + mover(int actual, int un):bool
}

Jugador "*" -> "2" Dado
Jugador "*" --> "1" Tablero
@enduml
```

Y este sería el de secuencias:

```plantuml
@startuml
actor Usuario
participant Jugador
participant d1 as "d1:Dado"
participant d2 as "d2:Dado"
participant Tablero

Usuario --> Jugador : realizarJugada()
activate Jugador

alt par
    Jugador -> d1 : "tirar()"
    activate d1
    Jugador <-- d1 : n1
    deactivate d1

else
    Jugador -> d2 : "tirar()"
    activate d2
    Jugador <-- d2 : n1
    deactivate d2
end

Jugador -> Jugador : "ca:= casillaActual()
activate Jugador
deactivate Jugador

Jugador -> Tablero : "mover(ca,n1+n2)"
activate Tablero
Jugador <-- Tablero : "movRealizado"
deactivate Tablero
@enduml
```