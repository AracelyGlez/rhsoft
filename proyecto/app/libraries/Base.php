<?php

/** 
 * Conexion a Base de datos
 */

class Base
{
    private $motor = DBMOTOR;
    private $host = DBHOST;
    private $db   = DBNAME;
    private $user = DBUSER;
    private $pwd  = DBPWD;

    private $dbh; // handler base de datos
    private $stmt; // manejo de sentencias

    public function __construct() {
        # crear la conexion con el DBMS y  accesar a la base de datos
       
        try {
            $dsn =  $this->motor . ':host=' .$this->host .'; dbname=' . $this->db . '; charset=utf8';
            $this->dbh = new PDO($dsn, $this->user, $this->pwd);
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $evt) {
            echo "Se ha producido un error {$evt->getMessage()}";
        }
    } // fin de construct
/**
 * consulta (select), dos resultados
 *   --- solo regresa un registro
 *  ---- regresa multiples registros
 * update, delete, insert
 *  ---- numero de registro afectados
 * @param $sql es la consulta
 */
// crear metodos para cada situacion (dia 26 de abril)

# Habilitar la consulta (query) y prepararla
public function query($sql){
    $this->stmt = $this->dbh->prepare($sql);
}

#vinculacion (bind)
public function bind($parametro , $valor , $tipo = null){
// valorar parametro para determinar tipo
    switch(is_null($tipo)){
        case is_int($valor):
            $tipo = PDO::PARAM_INT;
        break;
        case is_bool($valor):
            $tipo = PDO::PARAM_BOOL;
        break;
        case is_null($valor):
            $tipo = PDO::PARAM_NULL;
        break;
        // asi le podemos seguir
        default:
            $tipo = PDO::PARAM_STR; 
   } // fin de switch
    $this->stmt->bindValue($parametro, $valor, $tipo);
}

public function execute(){
    $this->stmt->execute();
}

public function unico(){
    $this->execute();
    return $this->stmt->fetch(PDO::FETCH_OBJ);
}

public function multiple(){
    $this->execute();
    return $this->stmt->fetchAll(PDO::FETCH_OBJ);
} 

public function conteoReg(){
     return $this->stmt->rowCount();
}

}
