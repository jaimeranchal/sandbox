# Tarea Online 4

- Fecha límite: 22/02/2021

## Ejercicios

Todas las aplicaciones web se realizarán con el framework Laravel

1. Archivo PDF
2. App web sobre rutas y controladores
3. App web sobre vistas con Bootstrap y Blade
4. App web sobre bases de datos y Eloquent
5. App web sobre CRUD con formularios
6. App web sobre autenticación y sesiones

### 1. MVC y *framework* web

1. Realiza los siguientes ejercicios:
a) Resuelve estos diez [ejercicios](https://milq.github.io/cursos/fundprog/ud/06.html) sobre clases usando [OOP](https://www.w3schools.com/php/php_oop_what_is.asp) en PHP; [Ayuda](https://docs.hektorprofe.net/python/programacion-orientada-a-objetos/ejercicios/), y [ayuda2](https://www.superprof.es/apuntes/escolar/matematicas/analitica/recta/punto-medio.html)
b) Mira este [vídeo](https://www.youtube.com/watch?v=0sHSrqyZCnM&list=PLU8oAlHdN5Bk-qkvjER90g2c_jVmpAHBh&index=1), di qué trata e indica los puntos del curso que más te llaman la atención.
c) Lee y explica con tus propias palabras lo que es un [patrón de diseño sofware](https://en.wikipedia.org/wiki/Software_design_pattern).
d) Mira este [vídeo](https://www.youtube.com/watch?v=SbdbHvf5b7c&list=PLU8oAlHdN5Bk-qkvjER90g2c_jVmpAHBh&index=2) y explica con tus propias palabras el patrón de diseño [MVC](https://en.wikipedia.org/wiki/Model–view–controller) ([diagrama](https://milq.github.io/cursos/dwes/ud/4/mvc.jpg)).
e) Lee y explica con tus propias palabras lo que es un [*framework* web](https://en.wikipedia.org/wiki/Web_framework) y lo que es [Laravel](https://en.wikipedia.org/wiki/Laravel).
f) Explora la [documentación](https://laravel.com/docs/) oficial de Laravel y describe las diferentes formas de [instalar](https://laravel.com/docs/installation) Laravel.
g) Explica las [diferencias](https://stackoverflow.com/a/33052263) entre *composer update* y *composer install* y cuándo es mejor usar uno que otro.
h) Crea un proyecto en blanco en Laravel usando Composer. Ayúdate de [esto](https://laravel.com/docs/installation), [esto](https://milq.github.io/cursos/dwes/ud/3/laravel) o del curso ([1](https://www.youtube.com/watch?v=l9iOi4UGtCE&list=PLU8oAlHdN5Bk-qkvjER90g2c_jVmpAHBh&index=3), [2](https://www.youtube.com/watch?v=PuCdTAayogg&list=PLU8oAlHdN5Bk-qkvjER90g2c_jVmpAHBh&index=4) y [3](https://www.youtube.com/watch?v=Wa1cG8kITqc&list=PLU8oAlHdN5Bk-qkvjER90g2c_jVmpAHBh&index=5)).

### 2. Rutas y controladores

Antes de empezar, explora e investiga cómo funcionan las [rutas](https://laravel.com/docs/routing) y [controladores](https://laravel.com/docs/controllers) en Laravel.

2. Crea una web en Laravel siguiendo estos tutoriales:
a) Completa este [tutorial](https://www.youtube.com/watch?v=Yn23xVjaSQw&list=PLU8oAlHdN5Bk-qkvjER90g2c_jVmpAHBh&index=6) para crear las rutas */*, */sobrenosotros*, */contacto*, */foro* y */post/{id}/{nombre}*.
b) Completa este [tutorial](https://www.youtube.com/watch?v=PqFGnXCJl1E&list=PLU8oAlHdN5Bk-qkvjER90g2c_jVmpAHBh&index=7) para crear el controlador *EjemploController* y la ruta */inicio*.
c) Completa este [tutorial](https://www.youtube.com/watch?v=g6uCxmXsUZ4&list=PLU8oAlHdN5Bk-qkvjER90g2c_jVmpAHBh&index=8) para crear *Ejemplo2Controller* y *Ejemplo3Controller* usando *artisan*.
d) Completa este [tutorial](https://www.youtube.com/watch?v=RbC_u4jOaZI&list=PLU8oAlHdN5Bk-qkvjER90g2c_jVmpAHBh&index=9) para crear el controlador *PaginasController* que muestre páginas web.
e) Completa este [tutorial](https://www.youtube.com/watch?v=E0Y09v05RAk&list=PLU8oAlHdN5Bk-qkvjER90g2c_jVmpAHBh&index=10) para crear las rutas típicas de [CRUD](https://en.wikipedia.org/wiki/Create,_read,_update_and_delete) y verlas con *php artisan route:list*.

### 3. Vistas mediante Bootstrap y Blade

Antes de empezar, aprende lo que es un [sistema o motor de plantillas web](https://en.wikipedia.org/wiki/Web_template_system) y cómo funciona [Blade](https://laravel.com/docs/blade).

3. Crea una web en Laravel siguiendo estos tutoriales:
a) Completa este [tutorial](https://www.youtube.com/watch?v=Zj936-usB5w&list=PLU8oAlHdN5Bk-qkvjER90g2c_jVmpAHBh&index=11) para crear las rutas */*, */crear*, */articulos* y */mostrar* y enlazar a [BootstrapCDN](https://en.wikipedia.org/wiki/BootstrapCDN).
b) Completa este [tutorial](https://www.youtube.com/watch?v=UbJ4KBEbthk&list=PLU8oAlHdN5Bk-qkvjER90g2c_jVmpAHBh&index=12) para crear un menú de navegación descargando y usando [Bootstrap](https://getbootstrap.com/).
c) Completa este [tutorial](https://www.youtube.com/watch?v=QgUVYEZM7nc&list=PLU8oAlHdN5Bk-qkvjER90g2c_jVmpAHBh&index=13) para crear una plantilla base y tres plantillas descendientes.
d) Completa este [tutorial](https://www.youtube.com/watch?v=71mTVdV6E9Q&list=PLU8oAlHdN5Bk-qkvjER90g2c_jVmpAHBh&index=14) para mostrar desde una plantilla los valores del *array*: *$alumnos*.
e) Completa este [tutorial](https://www.youtube.com/watch?v=TwONvn1r7rA&list=PLU8oAlHdN5Bk-qkvjER90g2c_jVmpAHBh&index=15) combinar las plantillas hechas Blade con Bootstrap.

**Recomendado**: antes de seguir, comienza y completa la siguiente unidad didáctica: [servicios web](https://milq.github.io/cursos/dwes/ud/5/index.html).

### 4. Bases de datos y Eloquent

Antes de empezar, aprende lo que es [ORM](https://en.wikipedia.org/wiki/Object–relational_mapping), cómo funciona [Eloquent](https://laravel.com/docs/eloquent) y se establecen las [relaciones](https://laravel.com/docs/eloquent-relationships).

4. Crea una web en Laravel siguiendo estos tutoriales:
a) Mira este [tutorial](https://www.youtube.com/watch?v=V5WaW5VaWFY&list=PLU8oAlHdN5Bk-qkvjER90g2c_jVmpAHBh&index=16) y lee este [tutorial](https://milq.github.io/cursos/dwes/ud/3/laravel/3.html) para aprender a [configurar](https://laravel.com/docs/database#configuration) la base de datos en Laravel.
b) Completa este [tutorial](https://www.youtube.com/watch?v=5rc3fnYGV3Y&list=PLU8oAlHdN5Bk-qkvjER90g2c_jVmpAHBh&index=17), este [tutorial](https://www.youtube.com/watch?v=N5NX02arKaQ&list=PLU8oAlHdN5Bk-qkvjER90g2c_jVmpAHBh&index=18) y este [tutorial](https://www.youtube.com/watch?v=XrNlp_VqtF0&list=PLU8oAlHdN5Bk-qkvjER90g2c_jVmpAHBh&index=19) para [migrar](https://laravel.com/docs/migrations) en Laravel a la base de datos.
c) Visualiza este [tutorial](https://www.youtube.com/watch?v=2OjJuC26YSs&list=PLU8oAlHdN5Bk-qkvjER90g2c_jVmpAHBh&index=20) para aprender a ejecutar [consultas SQL nativas](https://laravel.com/docs/database#running-queries) en Laravel.
d) Completa este [tutorial](https://www.youtube.com/watch?v=LHJjFZsd5Iw&list=PLU8oAlHdN5Bk-qkvjER90g2c_jVmpAHBh&index=21) para seleccionar registros en Eloquent.
e) Completa este [tutorial](https://www.youtube.com/watch?v=5z32fnHc4X8&list=PLU8oAlHdN5Bk-qkvjER90g2c_jVmpAHBh&index=22) para seleccionar registros con filtros en Eloquent.
f) Completa este [tutorial](https://www.youtube.com/watch?v=8hD_C5BMra0&list=PLU8oAlHdN5Bk-qkvjER90g2c_jVmpAHBh&index=23) para insertar y actualizar registros en Eloquent.
g) Completa este [tutorial](https://www.youtube.com/watch?v=N8_FAnCQ5Cs&list=PLU8oAlHdN5Bk-qkvjER90g2c_jVmpAHBh&index=24) para actualizar en masa, borrar y crear registros en Eloquent.
h) Completa este [tutorial](https://www.youtube.com/watch?v=Cn5fUt7l4mk&list=PLU8oAlHdN5Bk-qkvjER90g2c_jVmpAHBh&index=25) para realizar [*soft deleting*](https://laravel.com/docs/eloquent#soft-deleting) en Eloquent.
i) Completa este [tutorial](https://www.youtube.com/watch?v=DkxHCVGkpwE&list=PLU8oAlHdN5Bk-qkvjER90g2c_jVmpAHBh&index=26) para crear una relación uno a uno en Eloquent.
j) Completa este [tutorial](https://www.youtube.com/watch?v=reUaUQKP0bA&list=PLU8oAlHdN5Bk-qkvjER90g2c_jVmpAHBh&index=27) para crear una relación uno a uno inverso en Eloquent.
k) Completa este [tutorial](https://www.youtube.com/watch?v=w02iIRjyZ28&list=PLU8oAlHdN5Bk-qkvjER90g2c_jVmpAHBh&index=28) para crear una relación uno a varios en Eloquent.
l) Completa este [tutorial](https://www.youtube.com/watch?v=GzCsNH29KtE&list=PLU8oAlHdN5Bk-qkvjER90g2c_jVmpAHBh&index=29) y este [tutorial](https://www.youtube.com/watch?v=Dge5VipF4RM&list=PLU8oAlHdN5Bk-qkvjER90g2c_jVmpAHBh&index=30) para crear una relación varios a varios en Eloquent.
k) Completa este [tutorial](https://www.youtube.com/watch?v=tcjY_tZg6fc&list=PLU8oAlHdN5Bk-qkvjER90g2c_jVmpAHBh&index=31) para crear relaciones polifórmicas en Eloquent.

**Tinker (opcional)**: mira este [tutorial](https://www.youtube.com/watch?v=XPiW_HcJEpM&list=PLU8oAlHdN5Bk-qkvjER90g2c_jVmpAHBh&index=32) y este [tutorial](https://www.youtube.com/watch?v=EuErtURpJFs&list=PLU8oAlHdN5Bk-qkvjER90g2c_jVmpAHBh&index=33) para aprender a usar la herramienta [Tinker](https://laravel.com/docs/artisan#tinker) de Artisan.

### 5. CRUD con formularios

**5.** Crea una web en Laravel siguiendo estos tutoriales:
a) Completa este [tutorial](https://milq.github.io/cursos/dwes/ud/3/laravel) o los siguientes para crear un [CRUD](https://en.wikipedia.org/wiki/Create,_read,_update_and_delete) con formularios: [1](https://www.youtube.com/watch?v=rUaiPn8hQeA&list=PLU8oAlHdN5Bk-qkvjER90g2c_jVmpAHBh&index=34), [2](https://www.youtube.com/watch?v=TzJlpzJD-lk&list=PLU8oAlHdN5Bk-qkvjER90g2c_jVmpAHBh&index=35), [3](https://www.youtube.com/watch?v=yCP4-3G-ZGs&list=PLU8oAlHdN5Bk-qkvjER90g2c_jVmpAHBh&index=36), [4](https://www.youtube.com/watch?v=Ya3Q1ogpF_M&list=PLU8oAlHdN5Bk-qkvjER90g2c_jVmpAHBh&index=37), [5](https://www.youtube.com/watch?v=tewkuz3L-1I&list=PLU8oAlHdN5Bk-qkvjER90g2c_jVmpAHBh&index=38), [6](https://www.youtube.com/watch?v=3lldzQR0ESY&list=PLU8oAlHdN5Bk-qkvjER90g2c_jVmpAHBh&index=39), [7](https://www.youtube.com/watch?v=k2wLuVZ9a4g&list=PLU8oAlHdN5Bk-qkvjER90g2c_jVmpAHBh&index=40) y [8](https://www.youtube.com/watch?v=ZomZoaSCE9Y&list=PLU8oAlHdN5Bk-qkvjER90g2c_jVmpAHBh&index=41).
b) (**opcional**) Completa [este](https://www.youtube.com/watch?v=nM_AFs-brQs&list=PLU8oAlHdN5Bk-qkvjER90g2c_jVmpAHBh&index=42), [este](https://www.youtube.com/watch?v=GmeIoH1pL_8&list=PLU8oAlHdN5Bk-qkvjER90g2c_jVmpAHBh&index=43) y [este](https://www.youtube.com/watch?v=VGft2SXUtyk&list=PLU8oAlHdN5Bk-qkvjER90g2c_jVmpAHBh&index=44) tutorial para aprender a usar [Forms & HTML](https://laravelcollective.com/docs) de [LaravelCollective](https://laravelcollective.com/).
c) Completa este [tutorial](https://www.youtube.com/watch?v=jEqnHCgh7MY&list=PLU8oAlHdN5Bk-qkvjER90g2c_jVmpAHBh&index=45) y este [tutorial](https://www.youtube.com/watch?v=hnyGzVr4Snw&list=PLU8oAlHdN5Bk-qkvjER90g2c_jVmpAHBh&index=46) para validar formularios desde Laravel.
d) Completa este [tutorial](https://www.youtube.com/watch?v=-bCdEb3K3uE&list=PLU8oAlHdN5Bk-qkvjER90g2c_jVmpAHBh&index=47) y este [tutorial](https://www.youtube.com/watch?v=5YIAZ1EuqHQ&list=PLU8oAlHdN5Bk-qkvjER90g2c_jVmpAHBh&index=48) para subir imágenes a una base de datos y mostrarlas
(sin LaravelCollective: *<form action='/productos' method='post' enctype='multipart/form-data'>*).

### 6. Autenticación y sesiones

6. Crea una web en Laravel siguiendo estos tutoriales:
a) Completa este [tutorial](https://www.youtube.com/watch?v=LHhrr8uNd-0&list=PLU8oAlHdN5Bk-qkvjER90g2c_jVmpAHBh&index=49) y este [tutorial](https://www.youtube.com/watch?v=sPkD-CnVY6s&list=PLU8oAlHdN5Bk-qkvjER90g2c_jVmpAHBh&index=50) para crear un sistema de registro de usuarios e inicio de sesión
(Laravel 6: *composer require laravel/ui* → *php artisan ui vue --auth* y enlazar a Bootstrap en las vistas).
b) Completa [este](https://www.youtube.com/watch?v=uUsuPe-qtAs&list=PLU8oAlHdN5Bk-qkvjER90g2c_jVmpAHBh&index=51) y [este](https://www.youtube.com/watch?v=y4KJHsljuhE&list=PLU8oAlHdN5Bk-qkvjER90g2c_jVmpAHBh&index=52) tutorial para crear roles y zona de usuarios registrados y no registrados.
c) Completa este [tutorial](https://www.youtube.com/watch?v=kJLv0chFd5k&list=PLU8oAlHdN5Bk-qkvjER90g2c_jVmpAHBh&index=53) y este [tutorial](https://www.youtube.com/watch?v=IeU9b5ytQEE&list=PLU8oAlHdN5Bk-qkvjER90g2c_jVmpAHBh&index=54) para manejar sesiones.
d) (\**opcional\**) Completa este [tutorial](https://www.youtube.com/watch?v=v7OBpyBeaeA&list=PLU8oAlHdN5Bk-qkvjER90g2c_jVmpAHBh&index=55) y este [tutorial](https://www.youtube.com/watch?v=zUvPWXwURxw&list=PLU8oAlHdN5Bk-qkvjER90g2c_jVmpAHBh&index=56) para enviar correos electrónicos.

### 7. Aplicación web completa con Laravel (opcional)

7. Completa este [tutorial](https://www.youtube.com/watch?v=gr16GSD0Clo&list=PLU8oAlHdN5Bk-qkvjER90g2c_jVmpAHBh&index=57) y los siguientes para crear una aplicación web completa de ejemplo.

## Actividades de ampliación

Crea una aplicación web en Laravel. Elige **uno** de los siguientes temas:

### 1. Compra *online* de entradas de cine

El usuario (cliente) se registrará, iniciará sesión y realizará una compra *online* de una o varias entradas de cine de un catálogo de 5 películas diferentes. El administrador (empresario) iniciará sesión y podrá comprobar todas las entradas compradas para cada película y qué clientes lo compraron. El administrador también podrá añadir y eliminar nuevas películas.

### 2. Biblioteca *online*

El usuario (cliente) se registrará, iniciará sesión y realizará un préstamo *online* de uno o varios libros desde y hasta una fecha determinada a partir de un catálogo de 10 libros diferentes. El usuario no podrá reservar un libro determinado si éste se encuentra actualmente prestado. El administrador (bibliotecario) iniciará sesión y podrá comprobar todos los libros prestados, en qué fechas y qué clientes lo solicitaron. El administrador también podrá añadir y eliminar nuevos libros.

### 3. Foro básico

El usuario (cliente) se registrará, iniciará sesión y abrirá un hilo de conversación, responderá en otro hilo de conversación ya existente y/o dara *me gusta* a un hilo o respuesta. El administrador iniciará sesión y podrá comprobar el número de mensajes de cada usuario y el número de *me gusta* en total recibidos. El administrador también podrá iniciar hilos y responder a hilos.
