<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Soporte_model extends CI_Model 
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
            $query = $this->db->get('tblsoporte'); // Produces:             
            return $query->result_array(); // Retornar Resultado
        }
    
//____________________________________________________________________________________________________________
        
    
    // funcion que al pasar un id retorne un array con los datos de un solo registro
    
        function detalle_registro($id) {
            
            $this->db->where("id",$id);
            $query = $this->db->get('tblsoporte'); 
            return $query->result_array(); // Retornar Resultado
            
        }
    
        // Funcion que me permita ingresar los datos del formulario en la tabla
        function ingresar()
        {
            // Para poder insertar datos en la BD, se deben pasar los values en un vector asociativo
            $data=array(
                'asunto'=>$this->input->post('asunto'),
                'descrip'=>$this->input->post('descrip'),
                'correo'=>$this->input->post('correo'),
                'fecha'=>date("c")                
            ); 
            
            // Invocar una funcion nativa del framework que realiza el insert
            return $this->db->insert("tblsoporte",$data);
        }

            function modificar ($id){
               $data=array(
                        
                        'solucion'=>$this->input->post('solucion'),
                        'fechasol'=>date("c"),
                    
                    ); 
        
            $this->db->where("id",$id);
            return $this->db->update("tblsoporte",$data);

            }

    

//____________________________________________________________________________________________________________
    }
?>