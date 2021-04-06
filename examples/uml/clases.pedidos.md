# Gestión de pedidos

Realiza el diseño de una aplicación para la gestión de pedidos. La aplicación deberá manejar clientes (se guarda su nombre, dirección, teléfono y e-mail), que pueden realizar pedidos de productos, de los cuales se anota la cantidad en stock. Un cliente puede tener una o varias cuentas para el pago de los pedidos. Cada cuenta está asociada a una tarjeta de crédito, y tiene una cierta cantidad disponible de dinero, que el cliente debe aumentar periódicamente para poder realizar nuevos pedidos.realizar nuevos pedidos. 

Un cliente puede empezar a realizar un pedido sólo si tiene alguna cuenta con dinero disponible. Al realizar un pedido, un cliente puede agruparlos en pedidos simples o compuestos. Los pedidos simples están asociados a una sola cuenta de pago y (por restricciones en la distribución) contienen un máximo de 20 unidades del(por restricciones en la distribución) contienen un máximo de 20 unidades del mismo o distinto tipo de producto. A su vez, un pedido compuesto contiene dos o más pedidos, que pueden ser simples o compuestos. Como es de esperar, el sistema debe garantizar que todos los pedidos simples que componen un pedido compuesto se paguen con cuentas del mismo cliente. Además, sólo es posible realizar peticiones de productos en stock. 

Existe una clase (de la cual debe haber una única instancia en la aplicación) responsable del cobro, orden de distribución y confirmación de los pedidos. El cobro de los pedidos se hace una vez al día, y el proceso consiste en comprobar todos los pedidos pendientes de cobro, y cobrarlos de la cuenta de pago correspondiente. Si una cuenta no tiene suficiente dinero, el pedido se rechaza (si es parte de un pedido compuesto, se rechaza el pedido entero). Una vez que el pedido está listo para servirse, se ordena su distribución, y una vez entregado, pasa a estar confirmado. 

Se pide un diagrama de clases de diseño. Añade las restricciones OCL necesarias.

```plantuml
@startuml
hide empty members
skinparam linetype ortho

abstract class Pedido {
    - total: int
    - estado: EstadoPedido
    + cobrar(): bool
    + servir(): void
    + confirmar(): void
    + obtenerTotal():int
    + obtenerDetalle(): void
    + obtenerCuentas(): List of Cuenta
    + addProducto(p: Producto, num:int): bool
}

class PedidoSimple extends Pedido {
    + cobrar(): bool
    + obtenerTotal():int
    + obtenerDetalle(): void
    + obtenerCuentas(): List of Cuenta
}
class PedidoCompuesto extends Pedido {
    + cobrar(): bool
    + obtenerTotal():int
    + obtenerDetalle(): void
    + obtenerCuentas(): List of Cuenta
    + addPedido(p:Pedido): void
    + delPedido(p:Pedido): void
}

class ControladorPedidos {
    + cobrarPedidos(): void
    + servirPedidos(): void
    + confirmPedidos(): void
}

class Producto {
    - nombre: string
    - precio: int
    - stock: int
    + modStock(num:int): void
}

class LineaPedido {
    - num: int
    + cambiar(num:int): bool
}

class Cliente {
    - nombre: string
    - direccion: string
    - tfno: string
    - email: string
    + editarCuenta(): void
    + realizarPedido(): void
    + estadoPedido(): void
    + rechazarPedido(p: Pedido): void
}

class Cuenta {
    - disponible: int
    - numTarjeta: string
    + aumentarDisponible(cantidad: int):void
    + pagarPedido(cantidad: int):void
}

enum EstadoPedido {
    - pendiente: int
    - pagado: int
    - servido: int
    - confirmado: int
    - rechazado: int
}

' relaciones
ControladorPedidos --> "*" Pedido
ControladorPedidos -> "*" Cliente
Cliente --> "1..*" Pedido
Cliente -- "1..*" Cuenta
Cuenta -- "*" PedidoSimple: asociado a
PedidoSimple "2..*" <-- PedidoCompuesto
Producto "1..*" <--o LineaPedido
Pedido "1" o--> "*" LineaPedido
Pedido "2..*" <--o PedidoCompuesto
@enduml
```