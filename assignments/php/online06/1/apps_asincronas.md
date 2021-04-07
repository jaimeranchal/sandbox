# Parte 1: Aplicaciones web asíncronas

## ¿Qué es la asincronía?

Según la [wikipedia](https://en.wikipedia.org/wiki/Asynchrony_(computer_programming)), y de una forma muy general, el término _asincronía_ se refiere a que dos o más eventos ocurran de forma indepediente en el tiempo. Lo contrario, la _sincronía_, describe un funcionamiento _procedural_, en el que los eventos ocurren uno detrás de otro. Un programa que se comporte de forma sincrónica queda **bloqueado** cada vez que se ejecuta una acción; mientras no se resuelva no puede hacer otra cosa. Esto es puede ser un problema especialmente en **operaciones E/S** (entrada / salida).

Tomemos como ejemplo de lo anterior una consulta a una base de datos para mostrar información de un producto. Una aplicación sincrónica se bloquea mientras espera los resultados de la consulta; no puede hacer otra cosa en ese transcurso de tiempo. Desde el punto de vista de la interacción con el usuario esto es problema que resta atractivo y sobretodo funcionalidad a una aplicación. La asincronía permite que la aplicación siga funcionando mientras espera los resultados de la consulta; es decir, **hacer varias cosas a la vez**, solucionando ese problema.

Otros ejemplos pueden ser:

- **llamada de teléfono** (funcionamiento sincrónico): un interlocutor habla y el otro debe _esperar_ a que el otro termine para poder responder.
- **enviar una carta**: aquí también se intercambian mensajes, pero mientras llegan a su destino, cada uno de los interlocutores puede hacer otras cosas. El sistema de correos realiza varias operaciones con la carta (certificarla, asignarla a un cartero, notificar de indicencias o tiempo de llegada...) pero el usuario que la envío _no participa_ de esas operaciones porque puede realizar otras tareas.

## Aplicaciones asíncronas

Por todo lo anterior, una aplicación web asíncrona es la que permite **comunicación no sincrónica** (entre usuarios o entre el usuario y el sistema), o que el usuario pueda **usar la aplicación mientras se realiza otra operación** de fondo.

- correo electrónico
- Aplicaciones de chat: Facebook Messenger, Whatsapp, Slack
- Gestores de tareas y productividad: Asana, Trello

## Ajax

AJAX (_XML y JavaScript Asíncrono_, en inglés) es conjunto de técnicas basadas en javascript y otras tecnologías, para permitir comunicaciones asíncronas en aplicaciones que sigan el modelo cliente-servidor. Permite interactuar con el servidor sin bloquear la funcionalidad en el lado del cliente:

- leer datos del servidor _después_ de que se haya cargado la página (cuando el usuario pinche un botón, p.e).
- Actualizar los datos mostrados _sin_ recargar la página.
- Enviar datos al servidor en segundo plano.

## Aplicaciones de página única

Muy relacionado con el tema de la asincrónia es el concepto de aplicación de página única (_Single Page Applications_, o SPA): una aplicación donde el usuario no necesita salir de la página principal. En este tipo de aplicaciones, la interfaz y el contenido cambian dinámicamente según la acción que se realice, sin que sea necesario recargar o cambiar de página. Ejemplos muy comunes de SPA son YouTube, Netflix o Gmail.

Simplificando mucho, el esquema de una SPA consiste en una interfaz que realiza llamadas asíncronas al servidor para enviar y obtener datos con los que ir modificando la interfaz según sea necesario. Para ello se usa mucho JavaScript y en particular algunas librerías y frameworks escritas en este lenguaje: React, Angular o Vue.

## Extra: desarrollo web _full-stack_

Ser capaz de crear una SPA requiere dominar muy bien las tecnologías y lenguajes propios del lado del **cliente** y también del **servidor**. A un desarrollador con estas características se lo conoce como _full-stack_, es decir, "completo", en tanto que controla los dos extremos necesarios para crear aplicaciones web. Aunque convertirse en un auténtico _full-stack developer_ no es un camino fácil, las ventajas laborales son importantes. Los puestos de _full-stack_ tienen mejores sueldos, y si trabajas como _freelancer_, es casi una obligación si quieres ser verdaderamente independiente.
