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

El usuario iniciará sesión y realizará una prueba online tipo test sobre PHP (mínimo 10 preguntas). El test tendrá un máximo de 3 intentos. Tiene que haber preguntas con respuestas únicas (radio) o múltiples (checkbox). El profesor, con rol administrador, iniciará sesión y podrá comprobar las respuestas y la nota de cada alumno y podrá generar un informe. Dicho informe mostrará las notas de cada alumno y estadísticas como nota media, moda, varianza, desviación típica, pregunta con más aciertos, pregunta con más fallos, etc.

## 2. Reservas online de coches

El usuario (cliente) iniciará sesión y realizará una reserva online de un coche desde y hasta una fecha determinada a partir de un catálogo de 10 coches diferentes. El usuario no podrá reservar un coche determinado desde y hasta una fecha determinada si se encuentra reservado algún momento entre esas fechas. El administrador (empresario) iniciará sesión y podrá comprobar todas las reservas de sus clientes y podrá generar un informe. Dicho informe mostrará las reservas de cada cliente y estadísticas como número de veces que ha reservado, cuántos días ha reservado, qué coche ha reservado más veces, etc.

## 3. Pizzería online

El usuario (cliente) iniciará sesión y realizará un pedido online de una o varias pizzas y podrá elegir hasta 10 ingredientes o hasta 5 especialidades diferentes. El usuario podrá añadir/eliminar ingredientes/pizzas y vaciar la cesta de la compra para empezar de nuevo. El administrador (empresario) iniciará sesión y podrá comprobar todos los pedidos de sus clientes y podrá generar un informe. Dicho informe mostrará los pedidos de cada cliente y estadísticas como precio medio del pedido, el ingrediente más y menos solicitado, la especialidad más y menos solicitada, etc.

Entrega:

- La estructura de archivos y carpetas debe quedar [así](https://milq.github.io/cursos/dwes/ud/2/estructura.txt).
- El script [inicio.sql](https://milq.github.io/cursos/dwes/ud/2/inicio.sql) creará las tres bases de datos con sus tablas, inserciones y restricciones necesarias.
- La página inicio.html permitirá acceder a todas las actividades.
- El profesor descomprimirá el ZIP en htdocs, iniciará XAMPP, entrará en PhpMyAdmin, ejecutará/importará el script inicio.sql y abrirá inicio.html desde localhost.

Material de apoyo: puede consultarse [aquí](https://milq.github.io/cursos/dwes/ud/2/).
