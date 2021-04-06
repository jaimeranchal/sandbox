<?php
/* Ejercicio 3 */
class Rectangulo {
    private $longitud;
    private $ancho;

    // constructor
    public function __construct($l, $a){
        $this->longitud = $l;
        $this->ancho = $a;
    }
    // calcula el área
    public function getArea(){
        return $this->longitud * $this->ancho;
    }
}
//instancias
$rectangulo1 = new Rectangulo(2,10);
$rectangulo2 = new Rectangulo(5,16);
$rectangulo3 = new Rectangulo(3,9);

// calcular el área de los rectangulos
echo("EJERCICIO 3: Calcular área de rectangulos"."<br>");
echo("Área del rectangulo 1: ".$rectangulo1->getArea()."<br>");
echo("Área del rectangulo 2: ".$rectangulo2->getArea()."<br>");
echo("Área del rectangulo 3: ".$rectangulo3->getArea()."<br>");
echo("<br>");
?>
