<?php
/* Ejercicio 1 */
class Punto {
    private $x;
    private $y;
    // getters
    public function getx(){
        return $this->x;
    }
    public function gety(){
        return $this->y;
    }
    // setters
    public function setx($value){
        $this->x = $value;
    }
    public function sety($value){
        $this->y = $value;
    }
}
// instancias
$punto1 = new Punto();
$punto2 = new Punto();
$punto3 = new Punto();

$punto1->setx(3);
$punto2->setx(4);
$punto3->setx(7);

echo("EJERCICIO 1: instanciar clase Punto y setters"."<br>");
echo("El atributo x del primero punto es ".$punto1->getx()."<br>");
echo("El atributo x del primero punto es ".$punto2->getx()."<br>");
echo("El atributo x del primero punto es ".$punto3->getx()."<br>");
echo("<br>");
?>
