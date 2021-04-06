# Empresa

Una aplicación quiere almacenar información sobre empresas, empleados y clientes. Estos dos últimos se caracterizan por su nombre y edad. Los empleados tienen un sueldo bruto y los que son directivos tienen una categoría, además de un grupo de empleados subordinados. De los clientes se necesita conocer también su teléfono de contacto. La aplicación necesita mostrar los datos de empleados y clientes

```plantuml
@startuml
skinparam linetype ortho
'skinparam linetype polyline

abstract class Persona {
    - nombre: String
    - edad: String
    + mostrar()
}

class Empleado {
    - sueldoBruto: double
    - tieneClientes: bool
    + mostrar(): void
    + calcSalarioNeto(): double
    + listarDisponibles(): array Empleado
}

class Cliente {
    - tfno: String
    - responsable: Empleado
    + mostrar(): void
    + editarTfno(): void
    + asignarEmpleado(Empleado): void
}

class Directivo {
    - categoría: String
    - subordinados: array Empleado
    + mostrar(): void
    + getCategoría(): String
    + setCategoría(): void
    + listarSubordinados(): array Empleado
}

class Empresa {
    - nombre
}

' relaciones
Persona <|-- Empleado
Persona <|-- Cliente
Empleado <|- Directivo
Directivo "0..*" -- "0..*" Empleado : subordinados

Empleado "1..*" --* "1" Empresa: tiene
Empleado "1" -- "1" Cliente: asignado
Cliente "0..*" --o "1..*" Empresa

@enduml
```