<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

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
                $this->load->Model('usuarios_model');
                $this->load->Model('Globales_usuarios_model');
                $this->load->helper('url_helper');
                // Agregar dos nuevos helpers. Uno para el "form" y otro para la "validacion" 
                $this->load->helper('form');
                // Libreria
                $this->load->library('form_validation');
                $this->ruta="./imagenes/usuarios";
                // Preguntar si la session esta activa
            if (!$this->session->userdata('id')) redirect("login");
            
        }
    
    // funcion de uso para el ingreso y la modificacion en el momento que se este ejecutando el formulario
    // se invoca tanto en el registro como en la modifiacion y retorna el nombrte del archivo para
    // aplicarlo tanto el insert como en el update
    
    function archivo($ftperfil) {
        // invocar la funcion que se encuentra en globales_model
        $dataarchivo=$this->Globales_usuarios_model->subirfoto($ftperfil,$this->ruta);
        // 
        $nombrearchivo="";
        
        //var_dump($dataarchivo);
        
        foreach($dataarchivo as $lista) {
           if (isset($lista["file_name"])) $nombrearchivo=$lista["file_name"];
        }
        
        return $nombrearchivo;
        
    }

	public function index()
	{
		// en la plantilla cargar las urls		
        $data["titulo"]="Usuarios";
        $data["descripcion"]="Este modulo ver los usuarios y realizar los procesos";
        $data["imagen"]="usuarios.jpg";
        
        // carga el model "listar_registros_usuarios"
        $data["lista"]=$this->usuarios_model->listar_registros();
        
        // Invoca la vista "usuarios.php" de la carpeta view
        
        $data["nombreusuario"]=$this->session->userdata('nombre')." ".$this->session->userdata('apellido');
         $data["idusuario"]=$this->session->userdata('id');
        
		$this->load->view('usuarios',$data);
	}
    
    
    
        public function registro()
	{
		// En la plantilla cargar las urls		
        $data["titulo"]="Registro De Usuarios";
        $data["descripcion"]="Este Modulo Permite Ingresar O Modificar Registros De Los Usuarios";
        $data["imagen"]="usuarios.jpg";
        $data["mensajes"]="";
        
        // Agregar los campos que son considerador requeridos: nombres, apellidos y documento
        // dentro form_validation que se llama set_rules (campo,texto,requerido)
        $this->form_validation->set_rules('nombres','<strong>Nombres</strong>','required');
        $this->form_validation->set_rules('apellidos','Apellidos','required');
        $this->form_validation->set_rules('documento','Documento','required');
        
        // podemos validar si se ejecuto el boton "guardar"
        if ($this->form_validation->run()===FALSE) {
            
        } else {
            // realice algun proceso de insercion
            // ANTES DE INSERTAR, PASAR EL NOMBRE DEL ARCHIVO
            $nombrearchivo=$this->archivo('ftperfil');
            
            $this->usuarios_model->ingresar($nombrearchivo);
            $data["mensajes"]="Registro ingresado con exito";
            
        }
        $data["lista"]=$this->usuarios_model->listar_registros();
       
            $data["nombreusuario"]=$this->session->userdata('nombre')." ".$this->session->userdata('apellido');
         $data["idusuario"]=$this->session->userdata('id');    
            
        $this->load->view('usuarios_formulario',$data);
	}
    
    public function modificar($id){
        
                
        $data["titulo"]="Edicion de usuarios";
        $data["descripcion"]="Este modulo permite editar el registro seleccionado";
        $data["imagen"]="usuarios.jpg";
        $data["mensajes"]="";
        
         
        $this->form_validation->set_rules('nombres','<strong>Nombres</strong>','required');
        $this->form_validation->set_rules('apellidos','Apellidos','required');
        $this->form_validation->set_rules('documento','Documento','required');
        
        // podemos validar si se ejecuto el boton "guardar"
        if ($this->form_validation->run()===FALSE) {
            
        } else {
            // realice algun proceso de modificacion
            // ANTES DE MODIFICAR, PASAR EL NOMBRE DEL ARCHIVO
            $nombrearchivo=$this->archivo('ftperfil');
            // validar previamente si nombrearchivo esta vacio
            // cargarlo con el valor oculto del campo que se llama 'anterior'
            if ($nombrearchivo=="") $nombrearchivo=$this->input->post('anterior');
            
                $usuario_data=array(
                    'nombre'=>$this->input->post('nombres'),
                    'apellido'=>$this->input->post('apellidos'),
                    'correo'=>$this->input->post('correo'),
                    'id'=>$id

                    );
                    
            $this->session->set_userdata($usuario_data);
            
            $this->usuarios_model->modificar($id,$nombrearchivo);
            $data["mensajes"]="Registro actualizado con exito";
            
        }
        
        
         $data["detalle"]=$this->usuarios_model->detalle_registro($id);
        
        $data["nombreusuario"]=$this->session->userdata('nombre')." ".$this->session->userdata('apellido');
         $data["idusuario"]=$this->session->userdata('id');
        
         $this->load->view('usuarios_formulario',$data);
        
    }
    
      
    
    public function eliminar($id) {
        
        
       // en la plantilla cargar las urls		
        $data["titulo"]="Usuarios";
        $data["descripcion"]="Este modulo ver los usuarios y realizar los procesos";
        $data["imagen"]="usuarios.jpg";
        // funcion que elimina registros
      
        $this->usuarios_model->eliminar($id);
        $data["mensajes"]="Registro eliminado con exito";
        
        $data["lista"]=$this->usuarios_model->listar_registros();
        
        $data["nombreusuario"]=$this->session->userdata('nombre')." ".$this->session->userdata('apellido');
         $data["idusuario"]=$this->session->userdata('id');

		$this->load->view('usuarios',$data);
        
        
    }
    
        
        
  
}











