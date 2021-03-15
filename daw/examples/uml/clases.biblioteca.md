# Biblioteca

Se pide realizar el diagrama de clases de una biblioteca:

- Una biblioteca tiene copias de libros. Estos se caracterizan por su nombre, tipo (novela, teatro, poesía, ensayo), editorial, año y autor.
- Los autores se caracterizan por su nombre, nacionalidad, y fecha de nacimiento.
- Cada copia tiene un identificador y puede estar en la biblioteca, prestada, con retraso o en reparación.
- Los lectores pueden tener un máximo de 3 libros en préstamo
- Cada libro se presta un máximo de 30 días, por cada día de retraso, se impone una multa de dos días sin posibilidad de recoger un libro nuevo.

Métodos para préstamo y devolución.

```plantuml
@startuml
hide empty members
skinparam linestyle ortho
class Libro {
    - titulo: string
    - tipo: tipoLibro
    - editorial: string
    - anyo : int
}

class Copia {
    - id: int
    - estado: estadoCopia
}

class Autor {
    - nombre: string
    - nacionalidad: string
    - fechaNac: Date
}

class Lector {
    - nSocio: int
    - nombre: string
    - tfno: string
    - direccion: string
    + devolver(id: int, fechaAct: Date)\n {precondition: prestamos.notEmpty()}
    + prestar(id: int, fechaAct: Date)\n {precondition: multa==0}
    - multar(dias:int)
}

class Prestamo {
    - inicio: Date
    - fin: Date
}
class Multa {
    - inicio: Date
    - fin: Date
}

enum tipoLibro {
    novela
    teatro
    poesia
    ensayo
}

enum estadoCopia {
    prestado
    retraso
    biblioteca
    reparacion
}

Copia "1..*" - "1" Libro: tiene
Libro "1..*" -- "1" Autor: tiene
Copia "0..3" -- "0..1" Lector: tiene
(Copia, Lector) - Prestamo
Lector "1" -- "0..1" Multa
@enduml
```