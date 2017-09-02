<?php
//script que tiene las funciones generales del proyecto
// subir archivo
// enviador de correo
defined('BASEPATH') OR exit('No direct script access allowed');
class Globables_model extends CI_Model {

        function __construct(){

                parent::__construct();
        }

        // funcion cargararchivos
    // parametros de entrada
    // dsarchivo = nombre del control tipo file del formulario
    // dsruta = la ruta que pasara dependiendo del controlador
    
        function cargararchivos($dsarchivo,$dsruta){
            
            // cargar libreria upload
            // con un vectot config de parametros
            $config['upload_path']=$dsruta;
            $config['allowed_types']="gif|png|pdf|jpg|txt";
            $config['max_size']="2048000";
            $config['max_width']='1024';
            $config['max_height']='768';
            $this->load->library('upload',$config);
          
            // peguntar si el archivo se sube o no se puede cargar
            // a la carpeta y el resultado sera el return de esta funcion
            if (!$this->upload->do_upload($dsarchivo)){
                
                return array('error'=>$this->upload->display_errors());
                
            } else {
                
                return array('datos_archivo'=>$this->upload->data());
                
            }
            
        }
}
?>




