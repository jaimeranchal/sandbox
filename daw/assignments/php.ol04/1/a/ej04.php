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
echo($circulo1->calcularArea());
echo($circulo2->calcularArea());
echo($circulo3->calcularArea());

echo($circulo1->calcularCircunferencia());
echo($circulo2->calcularCircunferencia());
echo($circulo3->calcularCircunferencia());

?>
