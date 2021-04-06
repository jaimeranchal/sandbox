# 1. Sistema de test online

## Acceso alumno
El usuario iniciará sesión y realizará una prueba online tipo test sobre PHP 

- mínimo 10 preguntas
- El test tendrá un máximo de 3 intentos.
- Tiene que haber preguntas con respuestas únicas (radio) o múltiples (checkbox).

### Acceso profesor 
El profesor, con rol administrador, iniciará sesión y podrá 

- comprobar las respuestas y la nota de cada alumno 
- generar un informe. Dicho informe mostrará 
    - las notas de cada alumno 
    - estadísticas como 
        - nota media,
        - moda,
        - varianza, 
        - desviación típica,
        - pregunta con más aciertos,
        - pregunta con más fallos, etc.

## Modelo de datos

Tablas:

1. usuarios
    - user_id (PK)
    - nombre
    - email
    - rol
2. preguntas
    - test_id
    - pregunta_id (PK)
    - texto
3. respuestas ( _la dejo tal cual o la fusiono con Opciones?_ )
    - respuesta_id (PK)
    - pregunta_id (FK)
4. Opciones
    - numero (PK?)
    - es_correcta (boolean)
    - pregunta_id (FK)
5. Respuestas_usuario
    - user_id (FK)
    - pregunta_id (FK)
    - numero (FK)
