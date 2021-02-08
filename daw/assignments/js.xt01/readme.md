# Objetivo

Gestionar edificios con información sobre:

- calle
- número
- código postal
- plantas del edificio (array):
    - número de puertas (array):
        - nombre del propietario

## Requisitos:

1. Crear un **array de objetos** que permita:
    - _Instanciar_ edificios (calle, número, cp).
    - **Métodos**:
        - `agregarPlantasYPuertas(numplantas, puertas)` al edificio sobre el que se invoque.
        - `agreparPropietario(nombre, planta, puerta)`
        - `toString()`: muestra toda la información del edificio y de los propietarios de cada puerta.
2. **Función** para crear edificios hasta que lo decida el usuario:
    - Cuando se cree un edificio se mostrará un mensaje:
      `Construido nuevo edificio en calle: xxx, nº:x, CP: xxxxx`
3. **Función** que establezca las plantas y puertas de cada de edificio:
    - solicita planta, puerta y propietario mediante `prompt`. Validar datos
    - Muestra mensaje de confirmación:
      `xxxx es ahora propietario de la puerta x en la planta x del edificio ubicado en la calle: xxx, nº:x`.
4. **Función** que liste todos los edificios ordenados de forma descendente por código postal:
```
Listado de propietarios del edificio calle Camino Caneiro, nº 29, CP 32004

+------+------+-----------+
|Planta|Puerta|Propietario|
+------+------+-----------+
|1     |1     |Sin asignar|
+------+------+-----------+
|1     |2     |Sin asignar|
+------+------+-----------+
|2     |1     |Luis Gómez |
+------+------+-----------+
...

```

Se usará un **módulo** donde como mínimo se establezca la clase y la función para validar números.
