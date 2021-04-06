# Llamada de un teléfono móvil

- El usuario pulsa los dígitos del número
- Para cada dígito:
    - La pantalla se actualiza para mostrar el número
    - Se emite un tono
- El usuario pulsa "enviar"
- El indicador "en uso" se ilumina
- El móvil se conecta a la red
- Los números acumulados se envían
- Se establece la conexión con el número marcado

```plantuml
@startuml
actor Usuario
participant Button
participant Dialer
participant Display
participant Speaker
participant Send as "send:Button"
participant CellularRadio

Usuario -> Button : marcar
activate Button

loop "for i = 1 a 9"
    Button -> Dialer : "digit(code)"
    activate Dialer
    Dialer -> Display: "displayDigit(code)"
    activate Display
    deactivate Display
    Dialer -> Speaker : "emitirTono(code)"
    activate Speaker
    deactivate Speaker
    deactivate Dialer
    deactivate Button
end

Usuario -> Send : "Enviar"
activate Send

Send -> Dialer : "enviar()"
deactivate Send
activate Dialer
Dialer -> CellularRadio : "connect(pno)"
activate CellularRadio
deactivate Dialer
Display <-- CellularRadio : "enUso()"
activate Display
@enduml
```