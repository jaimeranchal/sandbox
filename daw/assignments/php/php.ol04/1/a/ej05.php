<?php
/* Ejercicio 5 */
class Estudiante {
    private $nombre;
    private $notas; //array
    // getters
    public function getNombre(){
        return $this->nombre;
    }
    public function getNotas(){
        return $this->notas;
    }
    // setters
    public function setNombre($valor){
        $this->nombre = $valor;
    }
    public function setNotas($valor){
        $this->notas = $valor;
    }
    // constructor
    public function __construct($nombre, $notas){
        $this->nombre = $nombre;
        $this->notas = $notas;
    }
    // obtener media
    public function calcularMedia(){
        $numeroNotas = count($this->notas);
        $suma = 0;
        // sumamos todas las notas existentes
        foreach ($this->notas as $nota) {
            $suma += floatval($nota);
        }
        $media = $suma / $numeroNotas;
        return $media;
    }
}

// instancias
$estudiante1 = new Estudiante("Jaime", [2.5, 5.25, 6.75, 9]);
$estudiante2 = new Estudiante("Ana", [9.5, 6.5, 8, 7.5]);
$estudiante3 = new Estudiante("María", [7.5, 5.25, 6.75, 9]);

// calcular media de los estudiantes
echo("EJERCICIO 5: Calcular nota media de estudiantes"."<br>");
// Imprimimos las notas
echo("Estudiante 1"."<br>");
foreach ($estudiante1->getNotas() as $nota) {
    echo("- ".$nota."<br>");
}
echo("Nota media: ".$estudiante1->calcularMedia()."<br>");

echo("Estudiante 2"."<br>");
foreach ($estudiante2->getNotas() as $nota) {
    echo("- ".$nota."<br>");
}
echo("Nota media: ".$estudiante2->calcularMedia()."<br>");

echo("Estudiante 3"."<br>");
foreach ($estudiante3->getNotas() as $nota) {
    echo("- ".$nota."<br>");
}
echo("Nota media: ".$estudiante3->calcularMedia()."<br>");

echo("<br>");
?>
