<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Productos_model extends CI_Model 
{

    function __construct(){

    $this->load->database();

    }

    function listar_productos(){

        $query = $this->db->get('tblproductos');

        return $query->result_array();

    }
// funcion que me permita ingresar los datos del formulario en la tabla
    function ingresar($nombre_archivo,$nombre_archivo_pequeno){

        // para poder insertar en la base de datos, se deben pasar 
        // los values en un vector asociativo
        $data=array(
            'referencias'=>$this->input->post('referencias'),
            'nombre'=>$this->input->post('nombre'),
            'existencias'=>$this->input->post('existencias'),
            'valor'=>$this->input->post('valor'),
            'impuesto'=>$this->input->post('impuesto'),
            'proveedor'=>$this->input->post('proveedor'),
            'estado'=>$this->input->post('estado'),
            'dsarchivo'=>$nombre_archivo,
            'dsarchivop'=>$nombre_archivo_pequeno

        );            
        // invocar una funcion nativa del framework que realiza el insert
        return $this->db->insert("tblproductos",$data);
    }
    function modificar($id,$nombre_archivo,$nombre_archivo_pequeno) 
    {
        
         $data=array(
                'referencias'=>$this->input->post('referencias'),
                'nombre'=>$this->input->post('nombre'),
                'fecharegistro'=>$this->input->post('fecharegistro'),
                'existencias'=>$this->input->post('existencias'),
                'valor'=>$this->input->post('valor'),
                'impuesto'=>$this->input->post('impuesto'),
                'proveedor'=>$this->input->post('proveedor'),
                'estado'=>$this->input->post('estado'),
                'dsarchivo'=>$nombre_archivo,
                'dsarchivop'=>$nombre_archivo_pequeno
            ); 
        
        $this->db->where("id",$id);
        return $this->db->update("tblproductos",$data);
    }
    function eliminar($id) 
    {
         $this->db->where("id",$id);
        return $this->db->delete("tblproductos");
    }
  // funcion que al pasar un id retorne un array con los datos de un solo registro
    function detalle_registro($id) {

        $this->db->where("id",$id);
        $query = $this->db->get('tblproductos'); 
        return $query->result_array(); // Retornar Resultado

    }
}
?>