# Tarea Online 6

> La clínica veterinaria, **CliniCan Trassierra,** se ha puesto en contacto con nuestra consultoría para que realicemos una página web que lleve a cabo la gestión de consultas con las mascotas. Nuestra tarea será solamente desarrollar la parte del FrontEnd, ya que la BD y la parte del Backend ya están desarrollados. Para este proceso se aplicará lo aprendido en esta unidad: AJAX y jQuery.

La página deberá permitir las siguientes acciones:

## Paso 1

**Aplicar la librerias bootstrap y font Awesome para obtener este aspecto**:	

![1](./img/ej01.png)

## Paso 2

**Al cargar la página principal también haremos las siguientes operaciones**:

- Cargar los veterinarios en el combo correspondiente, mediante el fichero `veterinarios.php`
- Cargar los clientes en el combo correspondiente, mediante el fichero `clientes. php`
- Cargar en la capa tratamientos, todos los tratamientos mediante una lista no ordenada, mediante el fichero `tratamientos.php`

## Paso 3

**Al seleccionar un cliente, en el combo de las mascotas se cargarán las mascotas de ese cliente, mediante el fichero `perros.php` (usar XMLHttpRequest)**

## Paso 4

**El botón _Añadir_ permitirá dar de alta una mascota de ese cliente**

- Si no hay cliente seleccionado:
    - se mostrará un mensaje mediante la libreria _sweetAlert_
- Si hubiera un cliente:
    - mostrar una ventana modal donde se recogerán los datos de la mascota.
    - La ventana modal se realizará mediante la libreria _jquery UI_
- Al pulsar el botón _Añadir_:
    - se validará que todos los campos sean requeridos mediante la libreria _jquery Validation_ 
    - Los mensajes se mostrarán en español.
    - La mascota se guardará mediante el fichero, saveCan.php (fetch) y se añadirá el perro en el combo
    - Por último, se limpia los campos de los textos y se cierra la ventana.

![a](./img/ej04a.png)

![b](./img/ej04b.png)

## Paso 5

**El botón _Historial_ mostrará todas las consutlas a las que ha ido la mascota**

- Si no hubiera mascota elegida al pulsar el botón, tendrá el mismo tratamiento que el botón _Añadir_. 

![5](./img/ej05.png)

## Paso 6

**Para indicar el tratamiento que va a seguir la mascota**

- se hará dobleClick en los _Tratamientos Generales_
- añadiendo ese tratamiento en la capa _Tratamientos en Consulta_
- se eliminará de _Tratamientos Generales_.
- El mismo proceso se llevará a cabo para eliminar ese tratamiento de la capa _Tratamientos en Consulta_.

![6](./img/ej06.png)

## Paso 7

**El botón guardar**

- grabará un registro por consulta mediante el fichero `saveConsultas.php`
- Validar que todos sean campos requeridos, excepto Tratamientos en Consulta
    - la validación se realizará mediante jquery Validation
- En el campo Observaciones de la tabla Consultas, se guardará un texto con todos los tratamientos prescritos en la consulta.
- Mostrar un mensaje indicando la acción realizada y posteriormente se limpiarán los objetos para comenzar una nueva visita.
- No se utilizará `reload()`

![7](./img/ej07.png)
