<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* Clase central de acceso al sistema */
class Salir extends CI_Controller {

		public function __construct()
        {
                parent::__construct();
                $this->load->helper('url_helper');
        }

	public function index()
	{
        
          $usuario_data=array(
                    'nombre'=>FALSE,
                    'apellido'=>FALSE,
                    'correo'=>FALSE,
                    'id'=>FALSE

                    );
                    
        $this->session->sess_destroy();
        redirect('login');
    
	}
}
