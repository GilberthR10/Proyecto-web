<?php
//Script que tiene las funciones generales de proyecto
    //Subir archivo
    //Entrega de correos
defined('BASEPATH') OR exit('No direct script access allowed');

class Globalesp_models extends CI_Model 
{
    // Constructor
    function __construct()
    {
        parent::__construct();
        //Ruta donde se almacenaran las imagenes o documentos
        $this->ruta="./imagenes";
    }
    //Funcion cargar_archivos
        //Parametros de entrada
        //$dsarchivo = nombre del control tipo file del formulario
        //$dsruta = la ruta que pasara dependiendo del controlador
    
    function cargar_archivos($dsarchivo, $dsruta)
    {
        //Cargar libreria Upload con un vector config de parametros
        $config['upload_path']  = $dsruta;
        $config['allowed_types'] = "gif|png|pdf|jpg|txt";
        $config['max_size']     = "2048000";
        $config['max_width']    = "1300";
        $config['max_height']   = "1300";
        $this->load->library("upload",$config);
        
        /*Preguntar si el archivo se sube o no se puede 
        cargar a la carpeta y el resultado sera el return de esta funcion*/
        
        if(!$this->upload->do_upload($dsarchivo))
        {
            return array('error'=>$this->upload->display_errors());
        }
        else
        {
            return array('datos_archivo'=>$this->upload->data());   
        }
    }
    
    function cargar_archivos_pequenos($dsarchivo, $dsruta)
    {
        //Cargar libreria Upload con un vector config de parametros
        $config['upload_path']  = $dsruta;
        $config['allowed_types'] = "gif|png|pdf|jpg|txt";
        $config['max_size']     = "2048000";
        $config['max_width']    = "500";
        $config['max_height']   = "500";
        $this->load->library("upload",$config);
        
        /*Preguntar si el archivo se sube o no se puede 
        cargar a la carpeta y el resultado sera el return de esta funcion*/
        
        if(!$this->upload->do_upload($dsarchivo))
        {
            return array('error'=>$this->upload->display_errors());
        }
        else
        {
            return array('datos_archivo'=>$this->upload->data());   
        }
    }
}
?>