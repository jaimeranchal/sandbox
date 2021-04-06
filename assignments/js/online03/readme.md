# Tarea Online 3

## Ejercicio 1
Realizar un script que permita generar por teclado 100 letras de la A-Z. Las letras se guardarán en un array. Seguidamente se debe generar un histograma con las frecuencias de cada letra en la secuencia. Para representar las barras del histograma utilizar secuencias del carácter '*'. Por ejemplo//

```
Secuencia: D, B, A, C, A, B, F ........

Histograma:

A: **

B:**

C:*

D:*

E:

F:*

....

```

## Ejercicio2
Realizar un programa que permita guardar todos los discos de música que tenemos en casa.

- Para ello se creará la clase Disco, que tendrá la siguiente información:
    - **Propiedades**:
        - Nombre del disco.
        - Grupo de música o cantante.
        - Año de publicación.
        - Tipo de música (Rock, Pop, Punk o Indie).
        - Localización : Número de estantería
        - Prestado: Almacenará un valor boolean. Por defecto será false.
    - **Métodos**:
        - El constructor no tendrá parámetros (las 4 primeras propiedades serán cadenas vacías, la localización será 0 por defecto y prestado estará a false).
        - Un método que permitirá introducir las cinco primeras propiedades, la propiedad de Prestado seguirá a false.
        - Un método que permita cambiar el número de estantería en la librería.
        - Un método que permita cambiar la propiedad Prestado.
        - Un método que muestre toda la información de un disco.

- Cuando el usuario cargue la página, se cargará el siguiente **menú**:
    1. Añadir un disco (y preguntará si quiere añadir al principio o al final).
    2. Mostrar el número de discos que hay registrados.
    3. Mostrar listado de discos ordenados de forma ascendente por el Nombre del disco.
    4. Mostrar listado de discos ordenados de forma descendentemente por el año de publicación
    5. Mostrar un intervalo de discos (Pedir que introduzca el intervalo en formato incio-fin; luego deberás extraer el valor inicio y fin). Se controlará posibles entradas incorrectas e informando al usuario
    6. Mostrar los discos de un tipo de música. Se pedirá el tipo de música y se validará
    7. Borrar un disco (y preguntará si quiere borrar al principio o al final).
    8.  Prestar un libro.
    9. Cambiar un libro de estantería

- Todas las operaciones que se realicen se irán mostrando en la página con su título.
- Para este ejercicio utilizaremos un módulo donde estableceremos como mínimo:
    - la clase
    - la función que validará solo números. 
        - Esta función se utilizará para comprobar:
            - el año de publicación,
            - la estantería 
            - para validar las opciones del menú.
