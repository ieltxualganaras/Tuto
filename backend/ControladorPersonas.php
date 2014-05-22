<?php
require './ControladorGeneral.php';
require './SentenciasDb.php';
/**
 * Description of ControladorPersonas
 *
 * @author ieltxu
 */
class ControladorPersonas extends ControladorGeneral implements SentenciasDb{
    
    public function listar() {

        $statement = $this->ejecutarSentencia(SentenciasDb::BUSCAR_PERSONAS);
        
        $arrayPersonas = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $arrayPersonas;
    }
    
    public function guardar(){
        
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $dni = $_POST['dni'];
        $id = $_POST['id'];
        
        if($nombre == "" || $apellido  == "" || $dni == "") {
            return "Todos los datos deben estar completos!";
        } 
        $parametros = array($nombre,$apellido,$dni);
        
        if($id == 0) {
        return $this->ejecutarSentencia(SentenciasDb::INSERTAR_PERSONA, $parametros);

        } else {
        $parametros[3] = $id;

        return $this->ejecutarSentencia(SentenciasDb::ACTUALIZAR_PERSONA, $parametros);

        }
    }
    
    public function eliminar() {
        $id = $_GET['id'];
        
        $parametros = array($id);
        
        return $this->ejecutarSentencia(SentenciasDb::BORRAR_PERSONA,$parametros);
    }
    
}
