<?php
/* Ejercicio 8 */
class Forma {
    private Punto $centro;

    public function area(){
        $num = 0;
        return $num;
    }
}

class RectanguloH extends Forma{
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

class CirculoH extends Forma{
    private $radio;
    // constructor
    public function __construct($r){
        $this->radio = $r;
    }
    // calcular area
    public function calcularArea(){
        $area = M_PI*pow($this->radio, 2);
        return $area;
    }
    // calcular circunferencia
    public function calcularCircunferencia(){
        $circunferencia = 2*M_PI*$this->radio;
        return $circunferencia;
    }
}

// instancias
$circulo4 = new CirculoH(4);
$rectangulo4 = new RectanguloH(2,6);

echo("EJERCICIO 8: Herencia"."<br>");
echo("El area del círculo (según se define en la clase padre) es "
    .$circulo4->area()
    ."<br>");
echo("El area del rectángulo (según se define en la clase padre) es "
    .$rectangulo4->area()
    ."<br>");
echo("<br>");
?>
