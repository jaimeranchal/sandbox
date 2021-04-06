<?php
/* Ejercicio 4 */
class Circulo {
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
$circulo1 = new Circulo(3);
$circulo2 = new Circulo(7);
$circulo3 = new Circulo(9);

// calcular área y circunferencia
echo("EJERCICIO 4: Calcular área y circunferencias"."<br>");
echo("Área del círculo 1: ".$circulo1->calcularArea()."<br>");
echo("Circunferencia del círculo 1: ".$circulo1->calcularCircunferencia()."<br>");
echo("Área del círculo 2: ".$circulo2->calcularArea()."<br>");
echo("Circunferencia del círculo 2: ".$circulo2->calcularCircunferencia()."<br>");
echo("Área del círculo 3: ".$circulo3->calcularArea()."<br>");
echo("Circunferencia del círculo 3: ".$circulo3->calcularCircunferencia()."<br>");

echo("<br>");
?>
