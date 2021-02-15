<?php
/* Ejercicio 2 */
class Linea {
    private $x1;
    private $x2;
    private $y1;
    private $y2;
    // getters
    public function getx1(){
        return $this->x1;
    }
    public function getx2(){
        return $this->x2;
    }
    public function gety1(){
        return $this->y1;
    }
    public function gety2(){
        return $this->y2;
    }
    // setters
    public function setx1($value){
        $this->x1 = $value;
    }
    public function setx2($value){
        $this->x2 = $value;
    }
    public function sety1($value){
        $this->y1 = $value;
    }
    public function sety2($value){
        $this->y2 = $value;
    }
    // constructor
    public function __construct($x1, $x2, $y1, $y2){
        $this->setx1($x1);
        $this->setx2($x2);
        $this->sety1($y1);
        $this->sety2($y2);
    }
    // hallar punto medio
    public function getPuntoMedio(){
        // fórmula: M(x1+x2/2, y1+y2/2)
        $coord1 = ($this->x1 + $this->x2) / 2;
        $coord2 = ($this->y1 + $this->y2) / 2;
        $puntoMedio = $coord1.','.$coord2;
        return $puntoMedio;
    }
}
// instancias
$linea1 = new Linea(2,2,4,4);
$linea2 = new Linea(1,2,4,3);
$linea3 = new Linea(3,6,9,9);

// hallar el punto medio de los segmentos
echo($linea1->getPuntoMedio());
echo($linea2->getPuntoMedio());
echo($linea3->getPuntoMedio());
?>
