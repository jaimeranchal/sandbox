<?php
/* Ejercicio 6 */
require_once("./ej01.php");
// función que calcula la distancia euclídea entre dos Puntos
function calcularDistanciaEuclidea($linea1, $linea2){
    // de(P,Q) = raíz cuadrada de (p1-q1)2 + (p2-q2)2...+(pn-qn)2
    // obtenemos los atributos de los dos puntos
    $p1 = $linea1->getx();
    $p2 = $linea1->gety();
    $q1 = $linea2->getx();
    $q2 = $linea2->gety();

    $de = sqrt(pow(($p1-$q1), 2) + (pow(($p2-$q2),2)));
    return $de;
}

$punto4 = new Punto();
$punto5 = new Punto();

$punto4->setx(3);
$punto4->sety(6);
$punto5->setx(2);
$punto5->sety(8);

echo("EJERCICIO 6: calcular distancia euclídea" . "<br>");
echo("Dados los puntos"."<br>"
    ."p: ".$punto4->getx().", ".$punto4->gety()
    ."<br>"
    ."q: ".$punto5->getx().", ".$punto5->gety()
    ."<br>"
);
echo("La distancia euclídea entre los dos es: "
    .calcularDistanciaEuclidea($punto4, $punto5));

echo("<br>");
?>
