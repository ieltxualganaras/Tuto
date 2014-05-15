<?php
require './ConexionDb.php';
/**
 * Description of ControladorPersonas
 *
 * @author ieltxu
 */
class ControladorPersonas {
    
    private $_conexion = null;
    
    public function __construct() {
        $db = new ConexionDb();
        $this->_conexion = $db->getConexion();
    }

    public function listar() {

        $query = "SELECT * FROM persona";

        $statement = $this->_conexion->prepare($query);

        $statement->execute();

        $arrayPersonas = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $arrayPersonas;
    }
    
    public function guardar(){
        
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $dni = $_POST['dni'];
        $id = $_POST['id'];
        if($nombre = " ") {
            return "Hay que completar el nombre";
        }
        if($id == 0) {
        $query = "INSERT INTO persona (nombre, apellido, dni) VALUES (?,?,?)";
        
        $statement = $this->_conexion->prepare($query);
        $statement->bindParam(1, $nombre);
        $statement->bindParam(2, $apellido);
        $statement->bindParam(3, $dni);
        } else {
            $query = "UPDATE persona SET nombre = ?, apellido = ?, dni = ? WHERE id = ?";
                    
        $statement = $this->_conexion->prepare($query);
        $statement->bindParam(1, $nombre);
        $statement->bindParam(2, $apellido);
        $statement->bindParam(3, $dni);
        $statement->bindParam(4, $id);

        }
        
        return $statement->execute();
    }
    
    public function eliminar() {
        $id = $_GET['id'];
        
        $query = "DELETE from persona WHERE id = ?";
        $statement = $this->_conexion->prepare($query);
        
        $statement->bindParam(1, $id);
        
        $result = $statement->execute();
        return $result;
    }

}
