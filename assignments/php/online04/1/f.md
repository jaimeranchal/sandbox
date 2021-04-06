# Ejercicio 1.f

## Formas de instalar Laravel

Laravel ofrece dos métodos de instalación:

1. Mediante un [contenedor](https://www.xataka.com/otros/docker-a-kubernetes-entendiendo-que-contenedores-que-mayores-revoluciones-industria-desarrollo) Docker, usando la herramienta de línea de comandos [Sail](https://laravel.com/docs/8.x/sail) para interactuar con la configuración de Docker para Laravel.
2. Instalación global o local con [Composer]() y **php** instalados previamente en tu sistema.

### Izando velas con Docker

Un "contenedor" (también llamado a menudo _container_, en inglés) es un paquete software que contiene no solo la aplicación, sino también todas sus dependencias, de forma que pueda ejecutarse sin problemas independientemente del entorno de desarrollo.

Es una opción muy útil para probar código sin afectar al resto del sistema, y para resolver los típicos problemas de dependencias incumplidas o inexactas (_la aplicación necesita la versión 8 de php, pero mi sistema solo tiene instalada la 5.5_).

=== "macOS"
    ```bash
    curl -s https://laravel.build/example-app | bash
    cd example-app
    ./vendor/bin/sail up
    ```
=== "Windows"
    1. Instalar [Docker](https://www.docker.com/products/docker-desktop)
    2. Instalar/habilitar el _Subsistema Windows para Linux 2_ ([WSL2](https://docs.microsoft.com/en-us/windows/wsl/install-win10)), para poder ejecutar binarios linux directamente en Windows 10.
    3. Abrir una terminal con WSL2:

    ```bash
    curl -s https://laravel.build/example-app | bash
    cd example-app
    ./vendor/bin/sail up
    ```
=== "Linux"
    ```bash
    curl -s https://laravel.build/example-app | bash
    cd example-app
    ./vendor/bin/sail up
    ```

### Instalación con Composer

Hay varias formas de instalar [Composer](https://getcomposer.org/doc/00-intro.md). En Debian por ejemplo, hay que seguir los siguintes pasos.

=== "Dependencias"
    ```bash
    sudo apt update
    sudo apt install wget php-cli php-zip unzip
    ```
=== "Instalador"
    Composer ofrece un instalador escrito en php para facilitar el proceso:

    ```bash
    # Descargamos el instalador
    wget -O composer-setup.php https://getcomposer.org/installer
    ```

    Composer es una aplicación de línea de comandos compuesta por un único archivo. Se puede puede instalar de forma **local** o **global**; en el segundo caso se necesitan permisos de _superusuario_.

=== "Global"
    Descarga el archivo en una ubicación accesible por todos los usuarios, incluida en la variable `PATH` del sistema (`usr/local/bin` p.e):

    ```bash
    sudo php composer-setup.php --install-dir=/usr/local/bin --filename=composer

    # Salida (si todo va bien)
    # 
    # All settings correct for using Composer
    # Downloading...
    # 
    # Composer (version 1.10.10) successfully installed to: /usr/local/bin/composer
    # Use it: php /usr/local/bin/composer
    ```

    Ahora puedes usar Composer teclando `composer` en la terminal.
==="Local"
    Si solo necesitamos Composer para un proyecto, o no queremos / podemos instalarlo de forma global, podemos descargar el archivo en el directorio raíz del proyecto:

    ```bash
    sudo php composer-setup.php --install-dir=/ruta/al/proyecto
    ```

    Esto instalará un archivo llamado `composer.phar`. Para usar Composer navega hasta el directorio raíz y ejecuta `php composer.phar`

=== "Actualizar"
    ```bash
    sudo composer self-update
    ```

Una vez instalados php y Composer en el sistema, seguimos los siguientes pasos:

=== "local"
    ```bash
    # 1. Inicia el entorno de desarrollo local de Laravel
    composer create-project laravel/laravel example-app
    cd example-app
    php artisan serve
    ```
=== "global"
    ```bash
    composer global require laravel/installer
    laravel new example-app
    cd example-app
    php artisan serve
    ```
