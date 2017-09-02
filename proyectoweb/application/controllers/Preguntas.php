<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Preguntas extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
		public function __construct()
        {
                parent::__construct();
                $this->load->Model('preguntas_model');
                $this->load->helper('url_helper');
                // Agregar dos nuevos helpers. Uno para el "form" y otro para la "validacion" 
                $this->load->helper('form');
                // Libreria
                $this->load->library('form_validation');
               
                // Preguntar si la session esta activa
            if (!$this->session->userdata('id')) redirect("login");
            
        }
    
    // funcion de uso para el ingreso y la modificacion en el momento que se este ejecutando el formulario
    // se invoca tanto en el registro como en la modifiacion y retorna el nombrte del archivo para
    // aplicarlo tanto el insert como en el update
    

	public function index()
	{
		// en la plantilla cargar las urls		
        $data["titulo"]="Preguntas Frecuentes";
        $data["descripcion"]="Este modulo ver las preguntas frecuentes y realizar los procesos";
        $data["imagen"]="preguntas.png";
        
        // carga el model "listar_registros_usuarios"
        $data["lista"]=$this->preguntas_model->listar_registros();
        
        // Invoca la vista "usuarios.php" de la carpeta view
        
        $data["nombreusuario"]=$this->session->userdata('nombre')." ".$this->session->userdata('apellido');
         $data["idusuario"]=$this->session->userdata('id');
        
		$this->load->view('preguntas',$data);
	}
    
    
    
        public function registro()
	{
		// En la plantilla cargar las urls		
        $data["titulo"]="Registro de preguntas frecuentes";
        $data["descripcion"]="Este Modulo Permite Ingresar O Modificar Preguntas Frecuentes";
        $data["imagen"]="preguntas.png";
        $data["mensajes"]="";
        
        // Agregar los campos que son considerador requeridos: nombres, apellidos y documento
        // dentro form_validation que se llama set_rules (campo,texto,requerido)
        $this->form_validation->set_rules('pregunta','<strong>Preguntas</strong>','required');
        $this->form_validation->set_rules('respuesta','Respuestas','required');
     
        
        // podemos validar si se ejecuto el boton "guardar"
        if ($this->form_validation->run()===FALSE) {
            
        } else {
            // realice algun proceso de insercion
            // ANTES DE INSERTAR, PASAR EL NOMBRE DEL ARCHIVO
            $this->preguntas_model->ingresar("");

            $data["mensajes"]="Registro ingresado con exito";
            
        }
        $data["lista"]=$this->preguntas_model->listar_registros();
       
            $data["nombreusuario"]=$this->session->userdata('nombre')." ".$this->session->userdata('apellido');
         $data["idusuario"]=$this->session->userdata('id');    
            
        $this->load->view('preguntas_formulario',$data);
	}
     
    public function modificar($id){
        
                
        $data["titulo"]="Edición de preguntas frecuentes";
        $data["descripcion"]="Este modulo permite editar el registro seleccionado";
        $data["imagen"]="preguntas.png";
        $data["mensajes"]="";
        
         
        $this->form_validation->set_rules('pregunta','<strong>Pregunta</strong>','required');
    
      
        
        // podemos validar si se ejecuto el boton "guardar"
        if ($this->form_validation->run()===FALSE) {
            
        } else {
            // realice algun proceso de modificacion
            // ANTES DE MODIFICAR, PASAR EL NOMBRE DEL ARCHIVO
     
            // validar previamente si nombrearchivo esta vacio
            // cargarlo con el valor oculto del campo que se llama 'anterior'
          
            
                  $this->preguntas_model->modificar($id);
            $data["mensajes"]="Registro actualizado con exito";
            
        }
        
        
         $data["detalle"]=$this->preguntas_model->detalle_registro($id);
        
        $data["nombreusuario"]=$this->session->userdata('nombre')." ".$this->session->userdata('apellido');
         $data["idusuario"]=$this->session->userdata('id');
        
         $this->load->view('preguntas_formulario',$data);
        
    }
        public function eliminar($id) {
        
        
       // en la plantilla cargar las urls		
        $data["titulo"]="Preguntas Frecuentes";
        $data["descripcion"]="Este modulo ver las preguntas frecuentes y realizar los procesos";
        $data["imagen"]="preguntas.png";
        // funcion que elimina registros
      
        $this->preguntas_model->eliminar($id);
        $data["mensajes"]="Registro eliminado con exito";
        
        $data["lista"]=$this->preguntas_model->listar_registros();
        
        $data["nombreusuario"]=$this->session->userdata('nombre')." ".$this->session->userdata('apellido');
         $data["idusuario"]=$this->session->userdata('id');

		$this->load->view('preguntas',$data);
        
        
    }

    // metodo o funcion que permite ver las preguntas frecuentes para usar el metodo acordion

    public function ver()
    {
        // en la plantilla cargar las urls      
        $data["titulo"]="Preguntas Frecuentes";
        $data["descripcion"]="Haga click sobre una pregunta para ver la respuesta ";
        $data["imagen"]="preguntas.png";
        
        // carga el model "listar_registros_usuarios"
        $data["lista"]=$this->preguntas_model->listar_registros();
        
        // Invoca la vista "usuarios.php" de la carpeta view
        
        $data["nombreusuario"]=$this->session->userdata('nombre')." ".$this->session->userdata('apellido');
         $data["idusuario"]=$this->session->userdata('id');
        
        $this->load->view('verpreguntas',$data);
    }
    
        
        
  
}











