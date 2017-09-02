<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class login_model extends CI_Model {

        function __construct(){

        $this->load->database();

        }

 
    //____________________________________________________________________________________________________________
        
    
    // funcion que al pasar un id retorne un array con los datos de un solo registro
    
        function validar() {
            //
            //traer los datos para ejecutar el acceso
            $correo=$this->input->post('correo');
            $clave=sha1($this->input->post('clave'));
            //
            //construir el query de acceso
            $sql=" select * from tblusuarios ";
            $sql.=" where correo =? and clave=? ";
            // invocar el que ejecuta sentencias query del modelo database
            $query=$this->db->query($sql,array($correo,$clave));
           
           
            return $query->result_array(); // Retornar Resultado
            
        }
    
}

?>