# Ejercicio 1.d

## Patrón de diseño MVC

Las siglas MVC se corresponden con _Modelo Vista Controlador_. MVC es un tipo de **patrón de diseño**, que divide la aplicación en tres bloques o partes:

- **Modelo**: los datos que se van a usar en la aplicación y especialmente sus **relaciones**; un ejemplo sería el modelo ER de cualquier problema que se nos ocurra (las asignaturas de un curso de instituto p.ej.)
- **Vista**: es la parte de la aplicación que _ve_ el usuario, y con la que **interacciona**: formularios, texto, menús...
- **Controlador**: por último, el controlador es la parte de la aplicación que contiene la lógica con la que se interrelacionan las _vistas_ con el _modelo_. Es decir, es el conjunto de operaciones que recogen las acciones del usuario, consultan en la base de datos y devuelven unos resultados. Estas acciones normalmente son consultas de información (datos de login p.ej).

Este modelo es bastante útil porque separa bloques _funcionales_ de la aplicación: la interfaz (_Vista_), la lógica (_Controlador_) y los datos (_Modelo_). Así resulta más fácil el mantenimiento y actualización de la aplicación.
