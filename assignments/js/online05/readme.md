# Ejercicio 1
Crear una página web que permita jugar a las siete y media. Es un juego de cartas que se desarrolla con barajas de 40 cartas. El objetivo del juego es llegar a sumar 7 y media con la carta de mano y las que se van pidiendo pero no pasarse nunca. El valor de las cartas es según el indicado, excepto las figuras sota, caballo y rey

La página deberá permitir las siguientes acciones:

## 1.Prepación
Programar el código de JavaScript en un fichero independiente. La única modificación que se permite realizar en el fichero .HTML es escribir la referencia al fichero de JavaScript, el fichero de estilo que se adjunta a la tarea y las librerías externas Ver punto Información de interés. (No calificable)

## 2.Botón Comenzar
Al pulsar el botón Comenzar, no se permitirá comenzar a jugar si los campos de entrada están en blanco o hubiera algún error. Cualquier anomalía se mostrará en los span correspondientes.

## 3.Generar tablero
Si los datos son correctos se pondrá en visible la capa cuyo id, tablero, y se crearán los siguientes objetos en ejecución:

- Dentro de la capa cuyo id es tableroPuntos:
    - Una etiqueta h2 que tenga el texto Puntuación.
    - Una caja de texto cuya clase sea puntuación, sea de solo lectura y cuyo atributo value sea 0.
- Dentro de la capa cuya clase sea baraja se creará la imagen cartaVuelta.jpg.
- Dentro del objeto cuyo id es botonCarta, se creará un botón cuyas clases serán btn y btn-primary.
- Dentro del objeto cuyo id es botonMePlanto, se creará un botón cuyas clases serán btn y btn-danger.

## 4.Barajar cartas
Las cartas se encontrarán en un array que en cada partida se realizará una ordenación aleatoria. Se buscará un algoritmo para cargar las cartas en el array.

## 5.Botón Carta 1
Al pulsar el botón Carta.

- Mostrar en el tablero, la primera carta que se encuentra en el array.
- Mostrar la puntuación acumulada.
- Eliminar del array esa carta.

## 6.Botón Carta 2
Se seguirá pulsando el botón Carta.

- Si llega a la puntuación de 7.5 puntos, habrá ganado.
- Si se pasa del valor 7.5 puntos, habrá perdido.

## 7.Botón Me Planto
Al pulsar el botón Me planto, aparecerá el siguiente mensaje:

## 8.Fin de partida
Una vez que la jugada ha terminado y se muestra el mensaje:

- Al elegir el botón Seguir jugando, se inicializará la puntuación a cero y se mostrará la carta cartaVuelta.jpg
- Al elegir el botón Fin del juego:
    - Deshabilitar los botones Carta y Me planto.
    - Se grabará la cookie, mediante localStorage, siendo la clave el nombre del usuario y el valor será un objeto con la siguiente estructura.

## 9.Implementación en jQuery
Crear otro script donde se implementará toda la funcionalidad del ejercicio con la librería jquery.
