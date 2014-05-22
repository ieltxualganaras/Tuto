<?php
require './ConexionDb.php';
/**
 * Controlador que se encarga de la conexión a la base de datos 
 * y de ejectuar las sentencias.
 *
 * @author ieltxu
 */
class ControladorGeneral {
    
    private $_conexion = null;
    
    public function __construct() {
        $db = new ConexionDb();
        $this->_conexion = $db->getConexion();
    }
    /**
     * 
     * @param string $query
     * @param array $parametros
     */
    public function ejecutarSentencia($query, $parametros = null) {
        
        $statement = $this->_conexion->prepare($query);
    
        if($parametros) {
            foreach ($parametros as $key => $parametro) {
                $statement->bindParam($key + 1, $parametro);
            }
        }

        $statement->execute();
        
        return $statement;
    }
}
