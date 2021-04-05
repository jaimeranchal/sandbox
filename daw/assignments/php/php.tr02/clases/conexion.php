<?php
/**
 * Clase para trabajar con bbdd usando PDO
 */
class Conexion {
    /* Datos de la conexión */
    private $host = 'localhost';
    private $db = 'pruebatrim2';
    private $user = 'root';
    private $pass = '';
    
    public function __construct() {
        $this->host;
        $this->db;
        $this->user;
        $this->pass; 
    }

    /* Setter para la base de datos */
    public function setDb($db){
        $this->db = $db;
    }
    // conectarse
    public function conectar(){
        try {
            /* $dsn = 'mysql:host=' . $host . ';dbname=' . $db; */
            $dsn = "mysql:host=$this->host;dbname=$this->db"; // Data Source Name (dsn)
            $dbh = new PDO($dsn, $this->user, $this->pass); // DataBase Handle (dbh)
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            $excepcion="Error en la base de datos: ".$e->getMessage();
            throw new Exception($excepcion);
        }
        return $dbh;
    }

    /* Insertar datos en una tabla
     * @param `string   $tabla`     nombre de la tabla
     * @param `array    $campos`    "campo1"+"campo2"+"campoN" 
     * @param `array    $valores`   $valor1+$valor2+$valor3 
     */
    public function insertar($tabla, $campos, $valores){
        $dbh = $this->conectar();
        $nombreCampos = implode(", ", $campos);
        // Genera tantos '?' como campos se hayan pasado
        $comodines = "";
        for ($i = 0; $i < count($campos)-1; $i++) {
            $comodines .= "?, ";
        }
        $comodines .= "?";

        $sql = "INSERT INTO $tabla($nombreCampos) VALUES($comodines)";
        $sth = $dbh->prepare($sql);
        // ejecutamos la sentencia
        $sth->execute($valores);
        $dbh = null;
    }

    /* Leer datos de una tabla: 
     * @param `$tabla`          nombre de la tabla
     * @param `array $campos`   campos a seleccionar; null para todos
     * @param `array $param` 
     *  - where   => "WHERE campo1 =? and campo2=?"
     *  - order   => "ORDER BY campo1..."
     * @param `array $valores`  $valor1+$valor2+$valor3 
     * @param `int $modo`  0: todos los resultados; 1: un resultado
     */
    public function leerDatos($tabla, $campos, $param, $valores, $modo){
        $dbh = $this->conectar();
        
        // Construir la sentencia preparada:
        // recoge todos los valores si no se especifica ninguno
        $nombreCampos = (is_null($campos)) ? "*" : implode(", ", $campos);

        $sql = "SELECT $nombreCampos FROM $tabla"; // datos y tabla
        
        // Aplica las claúsulas si están definidas
        if (!is_null($param)) {
            if (array_key_exists('where', $param)) $sql .= " ".$param['where'];
            if (array_key_exists('order', $param)) $sql .= " ".$param['order'];
        }
        /* $sql = 'select * from usuarios where id=? and pass=?'; */
        /* var_dump($sql); */
        $sth = $dbh->prepare($sql);

        /* $sth->execute(array($usuario, $password)); */

        // aplica los valores a la sentencia preparada, si están definidos
        if (!is_null($valores)){
            $sth->execute($valores);
        } else {
            $sth->execute();
        }
        // controla si recuperar todos los resultados o solo uno
        switch ($modo) {
            case 0:
                $resultado = $sth->fetchAll();
                break;
            case 1:
                $resultado = $sth->fetch();
                break;
        }
        $dbh = null;

        return $resultado;
    }

    /** Leer todo
     * @param `$tabla`
     */
    public function leerTodo($tabla) {
        $dbh = $this->conectar();
        // Construir la sentencia preparada:
        $sql = "SELECT * FROM $tabla";
        $sth = $dbh->prepare($sql);
        $sth->execute();
        $resultado = $sth->fetchAll();
        $dbh = null;

        return $resultado;
    }

    /* Eliminar
     * @param `$tabla`          nombre de la tabla
     * @param `array $param` 
     *  - campo   => valor
     */
    public function borrarDatos($tabla, $id){
        $dbh = $this->conectar();
        $sql = "DELETE FROM $tabla WHERE id=$id";
        $dbh->exec($sql);
        $dbh = null;
    }
}
?>

