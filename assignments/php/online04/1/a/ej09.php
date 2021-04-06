<?php
/* Ejercicio 9 */
require_once("./ej05.php");
function grupoMejorMedia($grupos){
    // $grupos = array de 3 arrays de Estudiantes 
    // calcular media en cada grupo
    $mediaGrupos = [];
    foreach ($grupos as $key=>$grupo) {
        // calcular media de cada estudiante
        $suma = 0; // sumatorio de medias
        for ($i = 0; $i < count($grupo); $i++) {
            $suma += $grupo[$i]->calcularMedia();
        }
        // dividimos la suma por el nº de estudiantes en el grupo
        $mediaGrupos[] = $suma / count($grupo);
        // Imprimimos para demostrar el funcionamiento
        echo("La media del grupo ".($key)." es ".($suma / count($grupo)));
        echo("<br>");
    }
    
    // grupo cuya media de "medias" (de cada estudiante) sea mayor
    $mejorGrupo = array_search(max($mediaGrupos), $mediaGrupos); 

    return $mejorGrupo;
}
// Estudiantes
$estudiante4 = new Estudiante("Carlos", [3.5, 4.25, 6.75, 7]);
$estudiante5 = new Estudiante("Luisa", [9.5, 5.5, 6.25, 8.5]);
$estudiante6 = new Estudiante("Isabel", [8.5, 7.25, 8.75, 9]);
$estudiante7 = new Estudiante("Pedro", [2.5, 4.25, 5.75, 7]);
$estudiante8 = new Estudiante("Asan", [7.5, 8.5, 8, 6.5]);
$estudiante9 = new Estudiante("Li", [7.25, 6.75, 7.50, 8]);
$estudiante10 = new Estudiante("Kika", [2.5, 3.25, 5.75, 5]);
$estudiante11 = new Estudiante("Amparo", [1.5, 3.75, 4.50, 5]);
$estudiante12 = new Estudiante("Yasira", [3.5, 5.25, 6.75, 7]);
// grupo 1
$grupo1 = [$estudiante4, $estudiante5, $estudiante6];
// grupo 2
$grupo2 = [$estudiante7, $estudiante8, $estudiante9];
// grupo 3
$grupo3 = [$estudiante10, $estudiante11, $estudiante12];

$grupos = [$grupo1, $grupo2, $grupo3];

echo("EJERCICIO 9: Calcular grupo de estudiantes con media más alta"."<br>");
echo("El grupo con la media más alta es el grupo ".grupoMejorMedia($grupos));
echo("<br>");
?>
