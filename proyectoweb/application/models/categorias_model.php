<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class categorias_model extends CI_Model {

        function __construct(){

        $this->load->database();

        }

        function listar_registros(){

            $query = $this->db->get('tblcategorias_producto');
            
            return $query->result_array();

        }
    
    //____________________________________________________________________________________________________________
        
    
    // funcion que al pasar un id retorne un array con los datos de un solo registro
    
        function detalle_registro($id) {
            
            $this->db->where("id",$id);
            $query = $this->db->get('tblcategorias_producto'); 
            return $query->result_array(); // Retornar Resultado
            
        }
    
    // funcion que me permita ingresar los datos del formulario en la tabla
    
    function ingresar()

    {
        // para poder insertar en la base de daros, se deben pasar
        // los values en un vector asociativo
        $data=array(
            'nombre'=>$this->input->post('nombre'),
            'estado'=>$this->input->post('estado')
        );
        // invocar una funcion nativa del framework que realiza el insert
        return $this->db->insert("tblcategorias_producto",$data);
    }
    
    function modificar($id) {
        
         $data=array(
                'nombre'=>$this->input->post('nombre'),
                'estado'=>$this->input->post('estado'),
            ); 
        
        $this->db->where("id",$id);
        return $this->db->update("tblcategorias_producto",$data);

        
    }

    function eliminar($id) {
         $this->db->where("id",$id);
        return $this->db->delete("tblcategorias_producto");
    }
}

?>