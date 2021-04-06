<?php
/* Ejercicio 7 */
class Linea2D {
    private Punto $p1;
    private Punto $p2;

    //constructor
    public function __construct($punto1, $punto2){
        $this->p1 = $punto1;
        $this->p2 = $punto2;
    }

    public function calcularPuntoMedio(){
        $coord1 = (($this->p1->getx() + $this->p2->getx())/2);
        $coord2 = (($this->p1->gety() + $this->p2->gety())/2);
        $pm = $coord1.','.$coord2;
        return $pm;
    }
    public function calcularDistanciaEuclidea(){
        $p1 = $this->p1->getx();
        $p2 = $this->p1->gety();
        $q1 = $this->p2->getx();
        $q2 = $this->p2->gety();

        $de = sqrt(pow(($p1-$q1), 2) + (pow(($p2-$q2),2)));
        return $de;
    }
}

//instancias
require_once("./ej01.php");
$linea2d1 = new Linea2D($punto1, $punto3);
$linea2d2 = new Linea2D($punto1, $punto2);
$linea2d3 = new Linea2D($punto2, $punto3);

echo("<br>");
echo("EJERCICIO 7: Clase Linea2d con atributos complejos (otras clases)"."<br>");
echo("El punto medio de la línea2D 1 es: "
    .$linea2d1->calcularPuntoMedio()
    ."<br>");
echo("La distancia euclídea de la línea2D 1 es: "
    .$linea2d1->calcularDistanciaEuclidea()
    ."<br>");
echo("El punto medio de la línea2D 2 es: "
    .$linea2d2->calcularPuntoMedio()
    ."<br>");
echo("La distancia euclídea de la línea2D 2 es: "
    .$linea2d2->calcularDistanciaEuclidea()
    ."<br>");
echo("El punto medio de la línea2D 3 es: "
    .$linea2d3->calcularPuntoMedio()
    ."<br>");
echo("La distancia euclídea de la línea2D 3 es: "
    .$linea2d3->calcularDistanciaEuclidea()
    ."<br>");

echo("<br>");
?>
