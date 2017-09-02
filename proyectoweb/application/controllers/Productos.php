<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productos extends CI_Controller {

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
        $this->load->Model('productos_model');
        $this->load->Model('globalesp_models');
        $this->load->helper('url_helper');
        // agregar dos nuevos helpers. Uno poara el form y otro para la validacion
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->ruta="./imagenes/productos";
            // Preguntar si la session esta activa
            if (!$this->session->userdata('id')) redirect("login");
    }
    /*Funcion para el ingreso y la modificacion en el momento que se este ejecutando el formulario
    y retorna el nombre del archivo para aplicarlo*/
    
    function archivo($nombre_archivo)
    {
        //Invocar la funcion de globales_models
        $data_archivo = $this->globalesp_models->cargar_archivos($nombre_archivo, $this->ruta);
        //
        $nombre_archivo = "";
        
        foreach($data_archivo as $lista)
        {
            if (isset($lista["file_name"])) $nombre_archivo = $lista["file_name"];
        }
        return $nombre_archivo;
    }
    
    function archivop($nombre_archivo_pequeno)
    {
        //Invocar la funcion de globales_models
        $data_archivo = $this->globalesp_models->cargar_archivos_pequenos($nombre_archivo_pequeno, $this->ruta);
        //
        $nombre_archivo_pequeno = "";
        
        foreach($data_archivo as $lista)
        {
            if (isset($lista["file_name"])) $nombre_archivo_pequeno = $lista["file_name"];
        }
        return $nombre_archivo_pequeno;
    }

	public function index()
	{
		// en la plantilla cargar las urls		
        $data["titulo"]="Productos";
        $data["descripcion"]="Modulo Para gestionar Productos Productos";
        $data["imagen"]="productos.png";
        // traer todos los datos de la tabla
        $data["lista"]=$this->productos_model->listar_productos();
        
        $data["nombreusuario"]=$this->session->userdata('nombre')." ".$this->session->userdata('apellido');
         $data["idusuario"]=$this->session->userdata('id');
		$this->load->view('productos',$data);
	}
    
    public function registro()
	{
		// en la plantilla cargar las urls		
        $data["titulo"]="Registro de productos";
        $data["descripcion"]="Este modulo permite ingresar o editar registros";
        $data["imagen"]="productos.png";
        $data["mensajes"]="";
        
        // agregar los campos que son considerador requeridos
        // documento,nombres y apellidos
        // dentro form_validation que se llama set_rules (campo,texto,requerido)
        
        $this->form_validation->set_rules('referencias','Referencias','required');
        $this->form_validation->set_rules('nombre','Nombre','required');
        $this->form_validation->set_rules('existencias','Existencias','required');
        $this->form_validation->set_rules('valor','Valor','required');
        $this->form_validation->set_rules('impuesto','Impuesto','required');
        $this->form_validation->set_rules('proveedor','Proveedor','required');
        $this->form_validation->set_rules('estado','Estado','required');
        
        // podemos validar si se ejecuto el boton "guardar"
        if ($this->form_validation->run()===FALSE) {
            
        } else {
            // realice algun proceso de insercion
            $nombre_archivo = $this->archivo('dsarchivo');
            $nombre_archivo_pequeno = $this->archivop('dsarchivop');
            $this->productos_model->ingresar($nombre_archivo,$nombre_archivo_pequeno);
            $data["mensajes"]="Registro ingresado con exito";
            //Antes de insertar, pasar el nombre del archivo
            
            
        }
        $data["lista"]=$this->productos_model->listar_productos();
        
        $data["nombreusuario"]=$this->session->userdata('nombre')." ".$this->session->userdata('apellido');
         $data["idusuario"]=$this->session->userdata('id');
        
        $this->load->view('productos_formulario',$data);
	}
    
    public function modificar($id)   
    {
        $data["titulo"]="Edicion de productos";
        $data["descripcion"]="Este modulo permite editar el registro seleccionado";
        $data["imagen"]="productos.png";
        $data["mensajes"]="";
        
        $this->form_validation->set_rules('referencias','Referencias','required');
        $this->form_validation->set_rules('nombre','Nombre','required');
        $this->form_validation->set_rules('existencias','Existencias','required');
        $this->form_validation->set_rules('valor','Valor','required');
        $this->form_validation->set_rules('impuesto','Impuesto','required');
        $this->form_validation->set_rules('proveedor','Proveedor','required');
        $this->form_validation->set_rules('estado','Estado','required');
        
        if ($this->form_validation->run()===FALSE) {
            
        } else {
            // realice algun proceso de insercion
            $nombre_archivo = $this->archivo('dsarchivo');
            $nombre_archivo_pequeno = $this->archivop('dsarchivop');
            
            if ($nombre_archivo_pequeno=="")
                $nombre_archivo_pequeno = $this->input->post('anteriorp');
            
            if ($nombre_archivo=="")
                $nombre_archivo = $this->input->post('anterior');
            
            $this->productos_model->modificar($id,$nombre_archivo,$nombre_archivo_pequeno);
            $data["mensajes"]="Registro actualizado con exito";
            
        }
        $data["detalle"]=$this->productos_model->detalle_registro($id);
        
        $data["nombreusuario"]=$this->session->userdata('nombre')." ".$this->session->userdata('apellido');
         $data["idusuario"]=$this->session->userdata('id');
        $this->load->view('productos_formulario',$data);
    }
    public function eliminar($id) {
        
        $data["titulo"]="Productos";
        $data["descripcion"]="Este modulo permite ver los productos y realizar los procesos";
        $data["imagen"]="productos.png";
        $this->productos_model->eliminar($id);
        $data["mensajes"]="Registro eliminado con exito";
        $data["lista"]=$this->productos_model->listar_productos();
        $data["nombreusuario"]=$this->session->userdata('nombre')." ".$this->session->userdata('apellido');
         $data["idusuario"]=$this->session->userdata('id');
		$this->load->view('productos',$data);
    }
}











