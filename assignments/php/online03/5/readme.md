# Tarea Online 2

Crea una aplicación web en XHTML, CSS (o Bootstrap), PHP y MariaDB (o PosgreSQL) que mediante conexiones a una base de datos MariaDB (o PosgreSQL) proporcione un servicio tanto para el usuario como para el administrador y que genere un informe.

Requisitos:

- Incluir una página de registro o alta como usuario nuevo.
- Inicio de sesión tanto para el rol de usuario como para el rol de administrador.
- Una vez iniciada la sesión como usuario, proporcionar un servicio al cliente.
- Una vez iniciada la sesión como administrador, proporcionar un servicio al empresario.
- Generar un informe recogiendo la información de una base de datos (PosgreSQL o MariaDB).
- Cerrar sesión tanto como usuario como administrador.
- La recogida de datos de los formularios debe ser segura (validación, filtración, saneamiento, etc.).
- **Opcional**: todos los documentos tienen que estar validados en XHTML 5.2, CSS 3 y WCAG 2.0 AAA.
- **Opcional**: subir las tres aplicaciones a la plataforma [Heroku](http://heroku.com) (para evaluar el funcionamiento) y a [GitHub](https://github.com) (para evaluar el código).

## 3. Pizzería online

Esquema de la Web (páginas):

1. Inicio; incluye:
    - login
    - menú:
        - realizar pedido (4)
        - acceso panel de administrador (7)
2. Registro (signin)
3. Cierre de sesión
4. Pedidos:
    - añadir pizzas e ingredientes
5. Cesta: 
    - revisar el pedido,
    - cambiarlo (volver a 4) 
    - o finalizar compra
6. Compra-finalizada: mensaje de tiempo de espera / info del pedido
7. Panel de administración:
    - pedidos por cliente (lista)
    - generar informe
8. Informe

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
