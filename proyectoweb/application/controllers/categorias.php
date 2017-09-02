<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class categorias extends CI_Controller {

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
                $this->load->Model('categorias_model');
                $this->load->helper('url_helper');
                // agregar dos nuevos helpers. Uno para el form y otro para la validación
            $this->load->helper('form');
            $this->load->library('form_validation');
                // Preguntar si la session esta activa
            if (!$this->session->userdata('id')) redirect("login");
            
        }

	public function index()
	{
		// en la plantilla cargar las urls		
        $data["titulo"]="Categorias";
        $data["descripcion"]="Este modulo permite ver las categorias de los productos y realizar los procesos";
        $data["imagen"]="categorias.jpg";
        // traer todos los datos de la tabla
        $data["lista"]=$this->categorias_model->listar_registros();
        $data["nombreusuario"]=$this->session->userdata('nombre')." ".$this->session->userdata('apellido');
         $data["idusuario"]=$this->session->userdata('id');
        
		$this->load->view('categorias',$data);
	}
    
    public function registro()        
    {
        // en la plantilla cargar las urls
        $data["titulo"]="Registro de categorías de Producto";
        $data["descripcion"]="Este módulo permite ingresar o editar registros";
        $data["imagen"]="categorias.jpg";
        $data["mensajes"]="";
        
        // agregar los campos que son considerados requeridos
        // documento, nombres y apellidos
        // dentro form_validation que se llama set_rules (campo, texto, requerido)
        
        $this->form_validation->set_rules('nombre','<strong>Nombre</strong>','required');
        $this->form_validation->set_rules('estado','Estado','required');
        
        // podemos validar si se ejecutó el borón "guardar"
        if ($this->form_validation->run()===FALSE) {
            
            } else {
                // realice algún proceso de inserción
                $this->categorias_model->ingresar();
                $data["mensajes"]="Registro ingresado con éxito";
            }
            $data["lista"]=$this->categorias_model->listar_registros();
        
        $data["nombreusuario"]=$this->session->userdata('nombre')." ".$this->session->userdata('apellido');
         $data["idusuario"]=$this->session->userdata('id');
        
            $this->load->view('categorias_formulario',$data);
        }
    
    public function modificar($id){
        
        $data["titulo"]="Edicion de categorías";
        $data["descripcion"]="Este modulo permite editar el registro seleccionado";
        $data["imagen"]="categorias.jpg";
        $data["mensajes"]="";
        
         
        $this->form_validation->set_rules('nombre','<strong>Nombre</strong>','required');
        $this->form_validation->set_rules('estado','Estado','required');
        
        // podemos validar si se ejecuto el boton "guardar"
        if ($this->form_validation->run()===FALSE) {
            
        } else {
            // realice algun proceso de modificacion
            $this->categorias_model->modificar($id);
            $data["mensajes"]="Registro actualizado con exito";
            
        }
        
        
         $data["detalle"]=$this->categorias_model->detalle_registro($id);
        
        $data["nombreusuario"]=$this->session->userdata('nombre')." ".$this->session->userdata('apellido');
         $data["idusuario"]=$this->session->userdata('id');
        
         $this->load->view('categorias_formulario',$data);
        
    }
    
    public function eliminar($id) {
        
        // en la plantilla cargar las urls		
        $data["titulo"]="Categorías";
        $data["descripcion"]="Este modulo permite ver las categorías de productos y realizar los procesos";
        $data["imagen"]="categorias.jpg";
        // funcion que elimina registros
      
        $this->categorias_model->eliminar($id);
        $data["mensajes"]="Registro eliminado con exito";
        
        $data["lista"]=$this->categorias_model->listar_registros();
        
$data["nombreusuario"]=$this->session->userdata('nombre')." ".$this->session->userdata('apellido');
         $data["idusuario"]=$this->session->userdata('id');
        
		$this->load->view('categorias',$data);
        
    }
    }











