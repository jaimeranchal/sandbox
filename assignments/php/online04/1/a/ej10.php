<?php
/* Ejercicio 10 */
class A {
    private $tipo = "Letra";
    protected $orden = 1;

    //getter
    public function getTipo(){
        return $this->tipo;
    }
    public function getOrden(){
        return $this->orden;
    }
    public function quienSoy(){
        $id = "Soy la clase A";
        return $id;
    }
}
class B extends A {
    protected $orden = 2;
    public function quienSoy(){
        $id = "Soy hijo de la clase A";
        return $id;
    }
}
class C extends B {
    protected $orden = 3;
    public function quienSoy(){
        $id = "Soy hijo de la clase B";
        return $id;
    }
}

//Instancias
$letra1 = new A();
$letra2 = new B();
$letra3 = new C();

echo("<br>");
echo("EJERCICIO 10: Herencia 2"."<br>");

echo($letra1->getTipo()." número ".$letra1->getOrden().", ".$letra1->quienSoy());
echo("<br>");
echo($letra2->getTipo()." número ".$letra2->getOrden().", ".$letra2->quienSoy());
echo("<br>");
echo($letra3->getTipo()." número ".$letra3->getOrden().", ".$letra3->quienSoy());
echo("<br>");
?>
