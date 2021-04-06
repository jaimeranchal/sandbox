# Ejercicio 1.g

## `composer update` y `composer install`. 

### Funcionamiento

=== "Update"
    `Composer update` actualiza las dependencias especificadas en `composer.json`. Si ese archivo contiene una línea `"mockery/mockery": "0.9.*",` y ya tienes instalada la versión `0.9.1` de ese paquete, al ejecutar se actualizará a la versión más reciente que exista.

    En detalle, lo que hace es:

    1. Leer `composer.json`
    2. Eliminar los paquetes instalados que ya no hacen falta
    3. Comprobar si hay actualizaciones disponibles
    4. Instalar la última versión de los paquetes indicados
    5. Actualizar el archivo `composer.lock` con la versión instalada de los paquetes.

=== "Install"
    `Composer install` **no actualiza** nada; simplemente _instala_ las dependencias especificadas en el archivo `composer.lock`.

    En detalle:

    1. Comprueba que existe el archivo `composer.lock` (si no, ejecuta `composer update` y lo crea)
    2. Lee el archivo `composer.lock`
    3. Instala los paquetes listados en el archivo

### Uso

¿Cuándo usar uno u otro? `Composer update` se usa en la fase de _desarrollo_, para actualizar los paquetes. `Composer install` se usa cuando vamos a **desplegar** la aplicación en un entorno de pruebas, usando las dependencias guardadas en el archivo `composer.lock` por `composer update`.

Por otra parte, `composer install` no permite **eliminar** dependencias

Ambos comandos se basan en modificar manualmente los archivos `composer.lock` y `composer.json`. Si sólo queremos añadir o eliminar dependencias sin tocar los archivos directamente, podemos usar:

`composer require dependencia`
:   Añade la dependencia mencionada a `composer.json` y la instala
`composer remove dependencia`
:   Elimina la dependencia.
:   Con la opción `--update-with-dependencies` elimina también los pequetes que dependan de él
