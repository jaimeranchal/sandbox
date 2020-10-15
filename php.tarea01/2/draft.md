::: {#cabecera .jumbotron .text-center .text-light}
Tutorial {#tutorial .display-3}
========

Primeros pasos con XAMPP
:::

::: {.container}
https://codeofaninja.com/2013/06/how-to-run-a-php-script.html

Instalando el servidor XAMPP
----------------------------

### ¿Qué es XAMPP?

Más que un servidor, XAMPP es un *paquete* de software que incluye lo
mínimo necesario para servir una web:

-   el servidor Apache,
-   un sistema de gestión de base de datos (MariaDB a partir de la
    versión 5.6.15) y
-   soporte para dos lenguajes de *scripting*: php y perl.

### ¿Dónde conseguirlo?

Desde la misma web oficial, [apachefriends](https://apachefriends.org),
donde hay disponibles versiones para Windows y Linux.

Requisitos
----------

En principio no es necesario instalar ningún paquete de software
adicional; todo lo necesario está incluido en la descarga oficial.

Instalación en Windows
----------------------

Los pasos a seguir son muy sencillos:

1.  Escoge la opción correspondiente
2.  Navega hasta la carpeta donde hayas descargado el ejecutable.
3.  Haz doble click sobre el archivo y sigue las instrucciones de
    instalación.

Una ver terminado se iniciará en modo gráfico. Cuando queramos crear un proyecto, los archivos de cada página se guardan en `C:\xampp\htdocs`

Instalación en Linux
--------------------

El proceso es similar al que hemos descrito para sistemas Windows:

1.  Escoge la opción correspondiente
2.  Navega hasta la carpeta donde hayas descargado el ejecutable.
3.  Instalación.

A partir de aquí tenemos dos opciones:

1.  Si quieres instalarlo en modo gráfico, haz click derecho sobre el
    archivo y elige la opción *abrir con el instalador de paquetes*.
2.  Si quieres instalaro en modo texto, mediante la terminal:
    1.  abre una consola
    2.  navega hasta el directorio `cd directorio/`
    3.  ejecuta con permisos de superusuario
        `dpkg -i xampp-installer.run`
    4.  sigue las instrucciones en pantalla

Los archivos de nuestra página se guardan en el directorio `/opt/lampp/htdocs`.
Podemos iniciar el gestor de xampp se inicia en modo gráfico desde el menú, o desde terminal con `sudo /opt/lampp/xampp start`.

Un poquito de PHP
-------------------

Php es un lenguaje _del lado del servidor_; lo que hagamos con él (que son muchas cosas) se "queda" dentro del servidor y no será visible a futuros visitantes de nuestro sitio.

Podemos **insertar directamente** nuestro código en un archivo html, o hacer una referencia desde el mismo a un **archivo separado**.

Vamos a ver un ejemplo muy sencillo que imprima el mensaje "Bienvenido a mi web, " seguido del nombre del usuario.

### Ejecutar PHP directamente

-   Creando un archivo llamado `codigo.php` en el directorio de XAMPP.
-   Abriéndolo directamente en el navegador.

### Ejecutar PHP embebido
:::
