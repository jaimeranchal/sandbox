# Datos del proyecto

## Objetivos
Crear una aplicación que permita:

- escoger un número de usuarios (2+)
- asignar una o varias tareas a cada usuario
- escoger una frecuencia de repetición:
    - diaria
    - semanal
    - mensual
- visualizar las tareas asignadas, realizadas y pendientes
- conservar un historial de tareas por usuario (realizada / no-realizada)

## Requisitos

1. Control de sesiones: dos tipos de usuarios:
    - admin: 
        - añadir / quitar usuarios
        - modificar etiquetas de tareas (realizada, fecha, asignación)
        - visualizar turnos de todos los usuarios
    - usuario:
        - visualizar su historial de tareas
        - visualizar tareas pendientes
        - marcar tarea realizada (hasta 3 días después de la fecha límite)
2. Control de fechas

## Diseño de base de datos

- usuarios
- tareas
- historial

