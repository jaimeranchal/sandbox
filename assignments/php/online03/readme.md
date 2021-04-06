# 3. Aplicaciones web con *cookies* y *hash* en PHP

## Actividades

**1.** Crea una página de ejemplo con [autenticación HTTP básica](https://www.php.net/manual/en/features.http-auth.php). A continuación, en dicha página, responde: ¿por qué no es seguro esta autenticación? ¿Cómo podría mejorarse? Para responder, puedes ayudarte con este [material](https://diego.com.es/autenticacion-http).

**2.** Crea una página de ejemplo con [autenticación HTTP *hash*/*digest*](https://www.php.net/manual/en/features.http-auth.php) con el algoritmo Blowfish/Bcrypt usando [*crypt()*](https://www.php.net/manual/en/function.crypt.php). A continuación, en dicha página, responde: ¿qué es una [función *hash*](https://es.wikipedia.org/wiki/Función_hash)? ¿Por qué es tan importante en seguridad informática? ¿Cuál sería la autenticación HTTP más segura de todas finalmente? Para responder, puedes ayudarte con este [material](https://diego.com.es/autenticacion-http).

**3.** Crea una cesta de la compra de frutas y verduras y almacénala durante una hora usando [*cookies*](https://es.wikipedia.org/wiki/Cookie_(informática)). El usuario elegirá una serie de frutas y verduras y mantendrá dichos alimentos escogidos durante una hora aunque cierre el navegador. Mediante [*setcookie()*](https://www.php.net/manual/en/function.setcookie.php), sin autenticación ni sesiones, almacena dicha cesta y crea también opciones para modificar, eliminar y comprobar si existe dicha *cookie*. Puedes ayudarte de los materiales de [Diego Lázaro](https://diego.com.es/cookies-en-php) y de [W3Schools](https://www.w3schools.com/php/php_cookies.asp).

**4.** Crea un balance sencillo de ingresos y gastos. Para obtener el balance, habrá que registrarse como usuario en una base de datos y después iniciar sesión; las contraseñas estarán almacenadas en *hash* mediante el algoritmo [Bcrypt](https://en.wikipedia.org/wiki/Bcrypt) (usa [*password_hash*](https://www.php.net/manual/en/function.password-hash.php) y [*password_verify*](https://www.php.net/manual/en/function.password-verify.php)). Una vez iniciada la sesión correctamente, el usuario introducirá, mediante formularios, una serie de ingresos y gastos, pulsará en *Generar* y, a continuación, verá un informe similar a [éste](https://milq.github.io/cursos/dwes/ud/3/balance.png) en PDF. Usa [MPDF](https://github.com/mpdf/mpdf), instalálo con [Composer](https://getcomposer.org/) y aloja esta aplicación web en Heroku (opcional) y en GitHub (captura del repositorio privado).

**5.** Realiza la [aplicación web](https://milq.github.io/cursos/dwes/ud/2) (*sistema de test online*, *reservas online de coches* o *pizzería online*) que no realizaste en la tarea anterior pero esta vez usando (además de bases de datos y sesiones) *cookies* para guardar la solicitud o pedido y funciones *hash* para almacenar las contraseñas de los usuarios.

## Evaluación

### Entrega

1. La estructura de archivos y carpetas debe quedar [así](https://milq.github.io/cursos/dwes/ud/3/estructura.txt).

    ```
    xxx_yyy_z
    ├── 1/
    ├── 2/
    ├── 3/
    ├── 4/
    ├── 5/
    ├── inicio.html
    └── inicio.sql

    ```
    El nombre de la carpeta será 'xxx_yyy_z', donde 'xxx' serán las tres primeras letras de tu primer apellido, 'yyy' las tres primeras letras de tu segundo apellido y 'z' la primera letra de tu primer nombre. Todo en minúsculas.
2. La página *inicio.html* permitirá acceder a todas las actividades.
3. El *script* [*inicio.sql*](https://milq.github.io/cursos/dwes/ud/3/inicio.sql) creará las dos bases de datos con sus tablas, inserciones y restricciones necesarias.
4. El profesor descomprimirá el ZIP en *htdocs*, iniciará XAMPP, entrará en PhpMyAdmin, ejecutará/importará el *script* *inicio.sql* y abrirá *inicio.html* desde *localhost*.

### Criterios de calificación

- Correcto funcionamiento de las actividades: **hasta 4 puntos**.
- Modelo de datos adecuado e implementación correcta del modelo de base de datos: **hasta 2 puntos**.
- Correcto funcionamiento de las sesiones (inicio, cierre, variables), *cookies* y *hash*: **hasta 2 puntos**.
- Principios de [diseño web](https://en.wikipedia.org/wiki/Web_design) (interfaz de usuario, experiencia de usuario, navegabilidad, interactividad, usabilidad, diseño gráfico web...) y validación de datos (filtrado, saneamiento, etc.): **hasta 2 puntos**.
