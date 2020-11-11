# Tarea Online 2

Crea dos o tres aplicaciones web en XHTML, CSS (o Bootstrap), PHP y MariaDB (o PosgreSQL) que mediante conexiones a una base de datos MariaDB (o PosgreSQL) proporcione un servicio tanto para el usuario como para el administrador y que genere un informe.

Las características de las tres aplicaciones web son las siguientes:

- Incluir una página de registro o alta como usuario nuevo.
- Inicio de sesión tanto para el rol de usuario como para el rol de administrador.
- Una vez iniciada la sesión como usuario, proporcionar un servicio al cliente.
- Una vez iniciada la sesión como administrador, proporcionar un servicio al empresario.
- Generar un informe recogiendo la información de una base de datos (PosgreSQL o MariaDB).
- Cerrar sesión tanto como usuario como administrador.
- La recogida de datos de los formularios debe ser segura (validación, filtración, saneamiento, etc.).
- **Opcional**: todos los documentos tienen que estar validados en XHTML 5.2, CSS 3 y WCAG 2.0 AAA.
- **Opcional**: subir las tres aplicaciones a la plataforma [Heroku](http://heroku.com) (para evaluar el funcionamiento) y a [GitHub](https://github.com) (para evaluar el código).

## 1. Sistema de test online

### Acceso alumno
El usuario iniciará sesión y realizará una prueba online tipo test sobre PHP 

- mínimo 10 preguntas
- El test tendrá un máximo de 3 intentos.
- Tiene que haber preguntas con respuestas únicas (radio) o múltiples (checkbox).

### Acceso profesor 
El profesor, con rol administrador, iniciará sesión y podrá 

- comprobar las respuestas y la nota de cada alumno 
- generar un informe. Dicho informe mostrará 
    - las notas de cada alumno 
    - estadísticas como 
        - nota media,
        - moda,
        - varianza, 
        - desviación típica,
        - pregunta con más aciertos,
        - pregunta con más fallos, etc.

### Modelo de datos

- tablas:
    1. usuarios
        - user_id (PK)
        - nombre
        - email
        - rol
    2. preguntas
        - test_id
        - pregunta_id (PK)
        - texto
    3. respuestas ( _la dejo tal cual o la fusiono con Opciones?_ )
        - respuesta_id (PK)
        - pregunta_id (FK)
    4. Opciones
        - numero (PK?)
        - es_correcta (boolean)
        - pregunta_id (FK)
    5. Respuestas_usuario
        - user_id (FK)
        - pregunta_id (FK)
        - numero (FK)

## 2. Reservas online de coches

### Acceso cliente
El usuario (cliente) iniciará sesión y realizará 

- una reserva online de un coche 
    - desde y hasta una fecha determinada 
    - a partir de un catálogo de 10 coches diferentes. 
    - no se podrá si el modelo se encuentra reservado algún momento entre esas fechas.

### Acceso empresario
El administrador (empresario) iniciará sesión y podrá 

- comprobar todas las reservas de sus clientes 
- generar un informe. Dicho informe 
    - mostrará las reservas de cada cliente 
    - estadísticas como 
        - número de veces que ha reservado,
        - cuántos días ha reservado,
        - qué coche ha reservado más veces, etc.

### Modelo de datos

- Tablas
    1. usuarios
    2. reservas
    3. coches

## 3. Pizzería online

### Acceso cliente
El usuario (cliente) iniciará sesión y podrá:

- realizar un pedido online de una o varias pizzas 
- elegir 
    - hasta 10 ingredientes o
    - hasta 5 especialidades diferentes.
- añadir/eliminar ingredientes/pizzas 
- vaciar la cesta de la compra para empezar de nuevo.

### Acceso empresario
El administrador (empresario) iniciará sesión y podrá 

- comprobar todos los pedidos de sus clientes 
- generar un informe. Dicho informe 
    - mostrará los pedidos de cada cliente 
    - estadísticas como 
        - precio medio del pedido,
        - el ingrediente más y menos solicitado,
        - la especialidad más y menos solicitada, etc.

### Modelo de datos

- Tablas
    1. usuarios
    2. pedidos
    3. pizza ( _igual sobra_)
    4. especialidades
    5. ingredientes

## Entrega

- La estructura de archivos y carpetas debe quedar [así](https://milq.github.io/cursos/dwes/ud/2/estructura.txt).
- El script [inicio.sql](https://milq.github.io/cursos/dwes/ud/2/inicio.sql) creará las tres bases de datos con sus tablas, inserciones y restricciones necesarias.
- La página inicio.html permitirá acceder a todas las actividades.
- El profesor descomprimirá el ZIP en htdocs, iniciará XAMPP, entrará en PhpMyAdmin, ejecutará/importará el script inicio.sql y abrirá inicio.html desde localhost.

Material de apoyo: puede consultarse [aquí](https://milq.github.io/cursos/dwes/ud/2/).
