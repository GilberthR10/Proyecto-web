<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class proveedores_model extends CI_Model {

        function __construct(){

        $this->load->database();

        }

        function listar_registros()
        {        
            $query = $this->db->get('tblproveedores');
            return $query->result_array();
        }
    
    //Funcion que al pasar un id retorne un array con los datos de un solo registro
    
    function detalle_registro($id)
    {
        $this->db->where("id",$id);
        $query = $this->db->get('tblproveedores');
        
        //inyeccionn 
        //$id="1=1 or '0'";
        
        //Segunda forma
        //$sql = "select * from tblproveedores where id=".$id;
        //$query = $this->db->query($sql);
        
        return $query->result_array(); //Retornar resultado
    }
    
    //funcion que permita ingresar los datos del formulario en la tabla
    function ingresar($nombrearchivo)
    {
        // para poder insertat en la base de datos, se deben pasar 
        // los values en un vector asociativo

        $data=array
        (
            'nombre'=>$this->input->post('nombre'),
            'apellidos'=>$this->input->post('apellidos'),
            'documento'=>$this->input->post('documento'),
            'estado'=>$this->input->post('estado'),
            'correo'=>$this->input->post('correo'),
            'clave'=>sha1($this->input->post('clave')),
            'dsarchivo'=>$nombrearchivo
        );
        
        
        
        $query = $this->db->get_where("tblproveedores", array('correo' => $data['correo']));
        if ($query->num_rows() > 0) 
        {
            return "0";
        } 
        else
        {
            //echo'<script>alert("!Gracias por resgistrarte!")/script>';             
            //$this->db->insert(tblproveedores,$data);
            //Invocar una funcion nativa del framework que realiza el insert
            return $this->db->insert("tblproveedores",$data);
        }
        
        
    }

    
    function modificar($id,$nombrearchivo,$claveModificar) {
        
         $data=array(
                'nombre'=>$this->input->post('nombre'),
                'apellidos'=>$this->input->post('apellidos'),
                'documento'=>$this->input->post('documento'),
                'estado'=>$this->input->post('estado'),
                'correo'=>$this->input->post('correo'),
                //'clave'=>sha1($this->input->post('clave')),
                'clave'=>$claveModificar,
                'dsarchivo'=>$nombrearchivo
            ); 
        
        $query = $this->db->get_where("tblproveedores", array('correo' => $data['correo']));
        if ($query->num_rows() > 0) 
        {
            $query = $this->db->get_where("tblproveedores", array('correo' => $data['correo'], 'id' => $id));
                if($query->num_rows() > 0)
                {
                    $this->db->where("id",$id);
                    return $this->db->update("tblproveedores",$data);
                }
                else  
                {
                    return "0";
                }
        } 
        else
        {
            $this->db->where("id",$id);
            return $this->db->update("tblproveedores",$data);
        }

    }

    
    function eliminar ($id)
    {
        $this->db->where("id",$id);
        return $this->db->delete("tblproveedores");
    }
}

?>