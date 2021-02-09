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
echo($estudiante1->calcularMedia());
echo($estudiante2->calcularMedia());
echo($estudiante3->calcularMedia());

?>
