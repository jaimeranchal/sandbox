# Modelo de datos

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
