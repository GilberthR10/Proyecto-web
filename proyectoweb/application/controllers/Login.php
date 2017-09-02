<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* Clase central de acceso al sistema */
class Login extends CI_Controller {

	
		public function __construct()
        {
                parent::__construct();
                $this->load->Model('login_model');
                $this->load->helper('url_helper');
                $this->load->helper('form');
                $this->load->library('form_validation');

            
            

        }

	public function index()
	{
        
        // en la plantilla cargar las urls		
        $data["titulo"]="Acceso al sistema de clientes y pedidos en linea";
        $data["descripcion"]="Por favor ingrese usuario y clave";
        $data["imagen"]="categorias.jpg";
      
        
		// en la plantilla cargar las urls		
		$this->load->view('login',$data);
	}
    
    // funcion que permite validar si el usuario existe o no 
    
    public function acceso(){
        
        
            $this->form_validation->set_rules('correo','<strong>correo</strong>','required');
        $this->form_validation->set_rules('clave','clave','required');
        
        // podemos validar si se ejecutó el borón "guardar"
        if ($this->form_validation->run()===FALSE) {
            
            } else {
                // realice algún proceso de inserción
                // validar si carga algun datos del modelo
                $datavalidar=$this->login_model->validar();
                if (count($datavalidar)>0) {
                    
                    //traer los datos que deseo guardar en las sessiones
                $usuario_data=array(
                    'nombre'=>$datavalidar[0]['nombres'],
                    'apellido'=>$datavalidar[0]['apellidos'],
                    'correo'=>$datavalidar[0]['correo'],
                    'id'=>$datavalidar[0]['id']

                    );
                    
                    $this->session->set_userdata($usuario_data);
                    //redireccionamos
                    redirect('home');
                } else {
                    // no tiene acceso
    $data["titulo"]="Acceso al sistema de clientes y pedidos en linea";
    $data["descripcion"]="<strong><h3>Usuario o clave no validos</strong></h3>";
    $data["imagen"]="categorias.jpg";
      
        
                    $this->load->view('login',$data);
                }
            } 
        
        
    }
    
}
