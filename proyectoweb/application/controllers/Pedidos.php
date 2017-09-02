<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pedidos extends CI_Controller {

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
        $this->load->Model('pedidos_model');
        $this->load->Model('productos_model');
        $this->load->Model('clientes_model');
        
        $this->load->Model('globalesp_models');
        $this->load->helper('url_helper');
        // agregar dos nuevos helpers. Uno poara el form y otro para la validacion
        $this->load->helper('form');
        $this->load->library('form_validation');
        // Preguntar si la session esta activa
        if (!$this->session->userdata('id')) redirect("login");
    }
    /*Funcion para el ingreso y la modificacion en el momento que se este ejecutando el formulario
    y retorna el nombre del archivo para aplicarlo*/
    
 
	public function index()
	{
		// en la plantilla cargar las urls		
        $data["titulo"]="Listado de Pedidos";
        $data["descripcion"]="Modulo que permite ver los pedidos creados en el sistema";
        $data["imagen"]="productos.png";
        // traer todos los datos de la tabla
        $data["lista"]=$this->pedidos_model->listar_pedidos();
        
        $data["nombreusuario"]=$this->session->userdata('nombre')." ".$this->session->userdata('apellido');
         $data["idusuario"]=$this->session->userdata('id');
		$this->load->view('pedidos',$data);
	}
    
    public function registro()
	{
		// en la plantilla cargar las urls		
        $data["titulo"]="Adicionar nuevo pedido";
        $data["descripcion"]="Este modulo permite agregar la cantidad solicitada de producto y asociar al pedido";
        
          $this->form_validation->set_rules('idcliente','idcliente','required');
        
        // podemos validar si se ejecuto el boton "guardar"
        if ($this->form_validation->run()===FALSE) {
            
        } else { 
            // proceso de insercion de datos
             $numero=$this->pedidos_model->ingresar();
            foreach($numero as $numero_lista){
            }
            $data["mensajes"]="Pedido numero ".$numero_lista["id"]." Ingresado con exito";
        } 
        $data["imagen"]="productos.png";
      
        $data["nombreusuario"]=$this->session->userdata('nombre')." ".$this->session->userdata('apellido');
         $data["idusuario"]=$this->session->userdata('id');
        
        // listar los productos para armar el pedido
        
         $data["lista"]=$this->productos_model->listar_productos();
        // traer los clientes para el select antes del bototon
          $data["listaclientes"]=$this->clientes_model->listar_registros();
        
        $this->load->view('pedidos_formulario',$data);
	}
    
    public function modificar($id)   
    {
       
    }
    public function eliminar($id) {
        
          $data["titulo"]="Listado de Pedidos";
        $data["descripcion"]="Modulo que permite ver los productos creados";
        $data["imagen"]="productos.png";
        $this->pedidos_model->eliminar($id);
         $data["mensajes"]="Pedido numero ".$id." eliminado con exito";
        $data["nombreusuario"]=$this->session->userdata('nombre')." ".$this->session->userdata('apellido');
        
         $data["idusuario"]=$this->session->userdata('id');
		$data["lista"]=$this->pedidos_model->listar_pedidos();
        
        $this->load->view('pedidos',$data);
    }
}











