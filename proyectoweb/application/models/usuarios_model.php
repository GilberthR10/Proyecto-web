<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_model extends CI_Model {

        function __construct()
        {

        $this->load->database();

        }
//____________________________________________________________________________________________________________
        
        function listar_registros (){

        $query = $this->db->get('tblusuarios'); // Produces: SELECT * FROM tblclientes
            
            return $query->result_array(); // Retornar Resultado

        }
    
    //funcion que al pasar un id retorne un array con los datos de un solo registro
    
    function detalle_registro($id){
        $this->db->where("id",$id);
            $query = $this->db->get('tblusuarios'); 
            return $query->result_array(); // Retornar Resultado

    }
    
    
    
    
    
        function ingresar($nombrearchivo){
        
        // para poder insertar en la base de datos, se deben pasar los valies en un vector asociativo
          $data=array(
                
                'nombres'=>$this->input->post('nombres'),
                'apellidos'=>$this->input->post('apellidos'),
                'documento'=>$this->input->post('documento'),
                'correo'=>$this->input->post('correo'),
                'ftperfil'=>$nombrearchivo
            ); 
            
            // Invocar una funcion nativa del framework que realiza el insert
            return $this->db->insert("tblusuarios",$data);
    }
    
    function modificar ($id, $nombrearchivo){
       $data=array(
                
                'nombres'=>$this->input->post('nombres'),
                'apellidos'=>$this->input->post('apellidos'),
                'documento'=>$this->input->post('documento'),
                'correo'=>$this->input->post('correo'),
                'ftperfil'=>$nombrearchivo
            ); 
        
        $this->db->where("id",$id);
        return $this->db->update("tblusuarios",$data);

    }
    
      function eliminar($id) {
         $this->db->where("id",$id);
        return $this->db->delete("tblusuarios");
    
         
     }   
    
}

?>