<?php
// clase central de funciones y aplicaciones para todo el sistema
defined('BASEPATH') OR exit('No direct script access allowed');

class Globales_model extends CI_Model  {


	function __construct()
	{
		parent::__construct();
		$this->ruta="./imagenes";
	}

	function subirarchivos($dsarchivo)
	{
		$config['upload_path'] = $this->ruta; // ruta donde se carga los datos
		$config['allowed_types'] = 'gif|jpg|png|pdf|txt|rar|zip'; // extensiones de archivos permitido
		$config['max_size']	= '2048000'; // tamaño maximo  en kb
		$config['max_width']  = '1024'; // maximo ancho
		$config['max_height']  = '768'; // maximo  alto

		// cada vez que se ejecuta el sistema lo guarda con un nombre diferente. Si desea que lo monte con el mismo
		//$config["file_name"]=$dsarchivo;

		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload($dsarchivo)) // dsarchivo es el nombre del archivo
		{
			$error = array('error' => $this->upload->display_errors());

			return $error;
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());

			return $data;
		}
	}
	
}
