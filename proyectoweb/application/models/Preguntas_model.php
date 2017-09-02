<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class   Preguntas_model extends CI_Model {

        function __construct()
        {

        $this->load->database();

        }
//____________________________________________________________________________________________________________
        
        function listar_registros (){

        $query = $this->db->get('tblpreguntas'); // Produces: SELECT * FROM tblclientes
            
            return $query->result_array(); // Retornar Resultado

        }
    
    //funcion que al pasar un id retorne un array con los datos de un solo registro
    
    function detalle_registro($id){
        $this->db->where("id",$id);
            $query = $this->db->get('tblpreguntas'); 
            return $query->result_array(); // Retornar Resultado

    }
    
    
    
    
    
        function ingresar($id){
        
        // para poder insertar en la base de datos, se deben pasar los valies en un vector asociativo
          $data=array(
                
                'pregunta'=>$this->input->post('pregunta'),
                'respuesta'=>$this->input->post('respuesta'),
            
            ); 
            
            // Invocar una funcion nativa del framework que realiza el insert
            return $this->db->insert("tblpreguntas",$data);
    }
    
    function modificar ($id){
       $data=array(
                
                'pregunta'=>$this->input->post('pregunta'),
                'respuesta'=>$this->input->post('respuesta'),
            
            ); 
        
        $this->db->where("id",$id);
        return $this->db->update("tblpreguntas",$data);

    }
    
      function eliminar($id) {
         $this->db->where("id",$id);
        return $this->db->delete("tblpreguntas");
    
         
     }   
    
}

?>