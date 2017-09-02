<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes_model extends CI_Model 
    {
        // Constructor
        function __construct()
        {

        $this->load->database(); // Carga la BD

        }
//____________________________________________________________________________________________________________
        
        //Funcion para listar los registros de la tabla clientes
        function listar_registros()
        {
            // Carga la tabla "tblclientes" de la BD
            $query = $this->db->get('tblclientes'); // Produces: SELECT * FROM tblclientes
            
            return $query->result_array(); // Retornar Resultado
        }
    
//____________________________________________________________________________________________________________
        
    
    // funcion que al pasar un id retorne un array con los datos de un solo registro
    
        function detalle_registro($id) {
            
            $this->db->where("id",$id);
            $query = $this->db->get('tblclientes'); 
            return $query->result_array(); // Retornar Resultado
            
        }
    
        // Funcion que me permita ingresar los datos del formulario en la tabla
        function ingresar($nombrearchivo)
        {
            // Para poder insertar datos en la BD, se deben pasar los values en un vector asociativo
            $data=array(
                'nombres'=>$this->input->post('nombres'),
                'apellidos'=>$this->input->post('apellidos'),
                'documento'=>$this->input->post('documento'),
                'correo'=>$this->input->post('correo'),
                'dsarchivo'=>$nombrearchivo
                
            ); 
            
            // Invocar una funcion nativa del framework que realiza el insert
            return $this->db->insert("tblclientes",$data);
        }
    
    function modificar($id,$nombrearchivo) {
        
         $data=array(
                'nombres'=>$this->input->post('nombres'),
                'apellidos'=>$this->input->post('apellidos'),
                'documento'=>$this->input->post('documento'),
                'correo'=>$this->input->post('correo'),
                'dsarchivo'=>$nombrearchivo
            ); 
        
        $this->db->where("id",$id);
        return $this->db->update("tblclientes",$data);

        
    }

    function eliminar($id) {
         $this->db->where("id",$id);
        return $this->db->delete("tblclientes");
    }
    
//____________________________________________________________________________________________________________
    }
?>