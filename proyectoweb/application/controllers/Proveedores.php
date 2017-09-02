<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proveedores extends CI_Controller 
{

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
                $this->load->Model('proveedores_model');
                $this->load->Model('globables_model');
                $this->load->helper('url_helper');
                $this->load->helper('form');
                $this->load->library('form_validation');
                $this->ruta='./imagenes/proveedores';
                // Preguntar si la session esta activa
            if (!$this->session->userdata('id')) redirect("login");
        }

	public function index()
	{
		// en la plantilla cargar las urls		
        $data["titulo"]="Proveedores";
        $data["descripcion"]="Este modulo perimete ver los proveedores y realizar los procesos";
        $data["imagen"]="proveedores.png";
        // traer todos los datos de la tabla
        $data["lista"]=$this->proveedores_model->listar_registros();
        
        $data["nombreusuario"]=$this->session->userdata('nombre')." ".$this->session->userdata('apellido');
         $data["idusuario"]=$this->session->userdata('id');
        
		$this->load->view('proveedores',$data);
	}
    
    public function registro()
	{
		// en la plantilla cargar las urls		
        $data["titulo"]="Registro de proveedores";
        $data["descripcion"]="Este modulo permite ingresar o editar los proveedores y realizar los procesos";
        $data["imagen"]="proveedores.png";
        $data["lista"]=0;
        $data["mensajes"]="";
        // agregar los campos que son considerados requeridos 
        //documento, nombres y apellidos
        //dentro form_validation que se llama set_rules (campo,texto,requerido)
        
        $this->form_validation->set_rules('nombre','Nombre','required');
        $this->form_validation->set_rules('apellidos','Apellido','required');
        $this->form_validation->set_rules('documento','Documento','required');
        
        //podemos validar si se ejecuto el boton "guardar"
        
        if($this->form_validation->run()===FALSE)
        {
            
        }
        
        else
        {
            // realice algun proceso de insercion
            // Antes de Insertar, pasar el nombre del archivo
            $nombrearchivo=$this->archivo('dsarchivo');
            
            $registro = $this->proveedores_model->ingresar($nombrearchivo);
            
            if ($registro == "0" )
            {
                $data["mensajes"]="Error. !alguien ya ha registrado ese correo";
            }
            else
            {
                $data["mensajes"]="Registro ingresado con exito";
            }
        }
        
        $data["lista"]=$this->proveedores_model->listar_registros();
        $data["nombreusuario"]=$this->session->userdata('nombre')." ".$this->session->userdata('apellido');
         $data["idusuario"]=$this->session->userdata('id');
        
		$this->load->view('proveedores_formulario',$data);
	}
    
    
    public function modificar($id){
        
        $data["titulo"]="Edicion de proveedores";
        $data["descripcion"]="Este modulo permite editar el registro seleccionado";
        $data["imagen"]="proveedores.png";
        $data["mensajes"]="";
        
         
        $this->form_validation->set_rules('nombre','<strong>Nombre</strong>','required');
        $this->form_validation->set_rules('apellidos','Apellidos','required');
        $this->form_validation->set_rules('documento','Documento','required');
        $this->form_validation->set_rules('estado','Estado','required');
        $this->form_validation->set_rules('correo','Correo','required');
        // podemos validar si se ejecuto el boton "guardar"
        if ($this->form_validation->run()===FALSE) {            
        } else {
            // realice algun proceso de modificacion
            // ANTES DE MODIFICAR, PASAR EL NOMBRE DEL ARCHIVO
            $nombrearchivo=$this->archivo('dsarchivo');
            $claveactual = $this->input->post('claveactual');
            $clave = $this->input->post('clave');
            
            // validar previamente si nombrearchivo esta vacio
            // cargarlo con el valor oculto del campo que se llama 'anterior'
            if ($nombrearchivo=="") 
            {
                $nombrearchivo=$this->input->post('anterior');
            }
            if($clave == $claveactual)
            {
                $claveModificar = $this->input->post('claveactual');
            }
            else
            {
                $claveModificar = sha1($this->input->post('clave'));
            }
            
            
            $registro = $this->proveedores_model->modificar($id,$nombrearchivo,$claveModificar);
            
            if ($registro == "0" )
            {
                $data["mensajes"]="Error. !alguien ya ha registrado ese correo¡ No se han modificado los datos";
            }
            else
            {
                $data["mensajes"]="Registro actualizado con exito";
            }
        }
        
        
         $data["detalle"]=$this->proveedores_model->detalle_registro($id);
        
        $data["nombreusuario"]=$this->session->userdata('nombre')." ".$this->session->userdata('apellido');
         $data["idusuario"]=$this->session->userdata('id');
        
         $this->load->view('proveedores_formulario',$data);
        
    }

    
    public function eliminar($id)
    {
        // en la plantilla cargar las urls		
        $data["titulo"]="Proveedores";
        $data["descripcion"]="Este modulo perimete ver los proveedores y realizar los procesos";
        $data["imagen"]="proveedores.png";
        
        $this->proveedores_model->eliminar($id);
        $data["mensajes"]="Registro eliminado con exito";
        
        $data["lista"]=$this->proveedores_model->listar_registros();
        
$data["nombreusuario"]=$this->session->userdata('nombre')." ".$this->session->userdata('apellido');
         $data["idusuario"]=$this->session->userdata('id');
        
		$this->load->view('proveedores',$data);
    }
    
    // Funcion de uso para el ingreso y la modificacion en el momento en el que se este ejecutando el formulario 
    // Se invoca tanto en el registro como en la modificacion y returna el nombre del archivo para aplicarlo tanto en el insert como en el updare
    
    public function archivo($dsarchivo)
    {
        // Invocar la funcion que se encuentra en globales_model
        $dataarchivo=$this->globables_model->cargararchivos($dsarchivo,$this->ruta);
        //
        $nombrearchivo="";
        
        //var_dump($dataarchivo);
        
        foreach($dataarchivo as $lista)
        {
           if(isset($lista["file_name"]))$nombrearchivo = $lista["file_name"];   
        }
        
        return $nombrearchivo;
        
    }
    
}