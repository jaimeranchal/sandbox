# Tarea Online 5

- Fecha límite: 8/03/2021

## Ejercicios

Responder cuestiones en PDF:

## 1. Servicios web

**1.** Realiza los siguientes ejercicios:
**a)** Lee, investiga y explica con tus propias palabras lo que es un [servicio web](https://es.wikipedia.org/wiki/Servicio_web) ([vídeo](https://www.youtube.com/watch?v=L37xAaIGiIY)) ([diagrama](https://milq.github.io/cursos/dwes/ud/5/servicio_web.png)).
**b)** Indica qué [ventajas](https://es.wikipedia.org/wiki/Servicio_web#Ventajas_de_los_servicios_web) e [inconvenientes](https://es.wikipedia.org/wiki/Servicio_web#Inconvenientes_de_los_servicios_web) presentan los servicios web y para qué se [usan](https://es.wikipedia.org/wiki/Servicio_web#Razones_para_crear_servicios_Web) principalmente.
**c)** Enumera algunos de todos los [protocolos](https://en.wikipedia.org/wiki/List_of_web_service_protocols) y [especificaciones](https://en.wikipedia.org/wiki/List_of_web_service_specifications) existentes en los servicios web.
**d)** Describe la [arquitectura](https://www.guru99.com/web-service-architecture.html#4) ([diagrama](https://milq.github.io/cursos/dwes/ud/5/servicio_web_arquitectura.png)) de un servicio web y qué tres roles y tres operaciones intervienen.
**e)** Indica los dos [tipos](https://www.guru99.com/web-service-architecture.html#7) de servicios web más populares en la actualidad.

## 2. SOAP

**2.** Realiza los siguientes ejercicios:
**a)** Lee, investiga y explica con tus propias palabras qué es el protocolo de mensajes [SOAP](https://en.wikipedia.org/wiki/SOAP) ([diagrama](https://milq.github.io/cursos/dwes/ud/5/servicio_web_soap.png)).
**b)** Indica qué [ventajas](https://en.wikipedia.org/wiki/SOAP#Advantages) e [inconvenientes](https://en.wikipedia.org/wiki/SOAP#Disadvantages) presenta SOAP y cuál es la [estructura](https://en.wikipedia.org/wiki/SOAP#SOAP_building_blocks) de un mensaje SOAP.
**c)** Muestra un [ejemplo](https://www.w3schools.com/xml/xml_soap.asp) de petición SOAP así como una respuesta del servidor a dicha petición.
**c)** Explica qué es [WSDL](https://en.wikipedia.org/wiki/Web_Services_Description_Language) y [UDDI](https://en.wikipedia.org/wiki/Web_Services_Discovery#Universal_Description_Discovery_and_Integration) y explica detalladamente el [funcionamiento](https://milq.github.io/cursos/dwes/ud/5/servicio_web_soap_arquitectura.png) de un servicio web SOAP .

## 3. REST y RESTful

**3.** Realiza los siguientes ejercicios:
**a)** Lee, investiga y explica con tus propias palabras esta [arquitectura de software](https://en.wikipedia.org/wiki/Software_architecture): [REST](https://en.wikipedia.org/wiki/Representational_state_transfer).
**b)** Esclarece la [diferencia](https://stackoverflow.com/a/1568858) entre REST y RESTful.
**c)** Explica las seis [restricciones](https://en.wikipedia.org/wiki/Representational_state_transfer#Architectural_constraints) de arquitectura REST que tiene que [cumplir](https://restfulapi.net/rest-architectural-constraints/) un servicio web RESTful.
**d)** Señala las [diferencias](https://www.guru99.com/comparison-between-web-services.html) entre REST y SOAP, cuándo es mejor uno que otro y qué retos afrontan sus API.

## 4. HTTP RESTful API

**4.** Realiza los siguientes ejercicios:
**a)** Define qué es una [RESTful API](https://en.wikipedia.org/wiki/Representational_state_transfer#Applied_to_web_services).
**b)** Estudia detenidamente e indica los tres [aspectos](https://en.wikipedia.org/wiki/Representational_state_transfer#Applied_to_web_services) que definen una RESTful API basada en HTTP.
**c)** Define qué es una [URI](https://en.wikipedia.org/wiki/Uniform_Resource_Identifier) y detalla cómo se usan para [nombrar](https://restfulapi.net/resource-naming/) recursos en una HTTP RESTful API.
**d)** Define [HTTP](https://en.wikipedia.org/wiki/Hypertext_Transfer_Protocol) y explica el uso de los métodos HTTP [GET](https://restfulapi.net/http-methods/#get), [POST](https://restfulapi.net/http-methods/#post), [PUT](https://restfulapi.net/http-methods/#put) y [DELETE](https://restfulapi.net/http-methods/#delete) en una HTTP RESTful API.
**e)** Define [*media type*](https://en.wikipedia.org/wiki/Media_type), enumera algunos e indica qué *media type* se usa en [este](https://milq.github.io/cursos/dwes/ud/5/httprestfulapiexamplejson.png) y en [este](https://milq.github.io/cursos/dwes/ud/5/httprestfulapiexamplehtml.png) HTTP RESTful API.
**f)** Define [JSON](https://en.wikipedia.org/wiki/JSON), cuáles son sus [tipos](https://restfulapi.net/json-data-types/) de datos, qué [diferencias](https://www.guru99.com/json-vs-xml-difference.html#7) hay con XML y pon tres [ejemplos](https://json.org/example.html) de JSON.
**g)** Explica detalladamente los [ejemplos](https://milq.github.io/cursos/dwes/ud/5/httprestfulapiexamplestable1.png) de esta tabla para el recurso Order.
**h)** Explica detalladamente todas las [combinaciones](https://milq.github.io/cursos/dwes/ud/5/httprestfulapiexamplestable2.png) de URI y métodos HTTP para el recurso User.

## 5. Uso de HTTP RESTful API en servicios web

**5.** Realiza los siguientes ejercicios:
**a)** Di en qué consiste el servicio web [JSONPlaceholder](https://jsonplaceholder.typicode.com/), enumera sus recursos, y pon ejemplos de rutas.
**b)** Explica qué es [Fetch API](https://developer.mozilla.org/en-US/docs/Web/API/Fetch_API) y ejecuta los ejemplos que viene en la [guía](https://jsonplaceholder.typicode.com/guide/) del servicio web JSONPlaceholder.
**c)** Usando Fetch API, haz una petición con método HTTP GET con URI */posts/10* a JSONPlaceholder.
**d)** Usando Fetch API, obtén todos los comentarios de la publicación 8 de JSONPlaceholder.
**e)** Usando Fetch API, obtén todas las publicaciones del usuario 1 de JSONPlaceholder.
**f)** Busca tres clientes REST *online*, lístalos y usa uno para obtener todos las *TODO's* de JSONPlaceholder.
**g)** Usando Fetch API o un cliente REST *online*, obtén todas los *posts* del usuario 1 de JSONPlaceholder.
**h)** Usando Fetch API o un cliente REST *online*, crea un nuevo comentario a un *post* de JSONPlaceholder.
**i)** Usando Fetch API o un cliente REST *online*, actualiza o modifica un *post* de JSONPlaceholder.
**j)** Usando Fetch API o un cliente REST *online*, borra el usuario 5 de JSONPlaceholder.

## Evaluación

### Entrega

1. La estructura de archivos y carpetas debe quedar [así](https://milq.github.io/cursos/dwes/ud/5/estructura.txt).
2. El profesor descomprimirá el ZIP y valorará cada unos de los PDF entregados.

### Criterios de calificación

- Servicios web: **hasta 1 punto**.
- SOAP: **hasta 1 punto**.
- REST y RESTful: **hasta 2 puntos**.
- HTTP RESTful API: **hasta 3 puntos**.
- Uso de HTTP RESTful API en servicios web: **hasta 3 puntos**.
