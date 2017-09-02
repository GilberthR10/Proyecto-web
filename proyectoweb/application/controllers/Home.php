<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {

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
                $this->load->helper('url_helper');
                // Preguntar si la session esta activa
              // cargar los modelos para totalizar los datos
                $this->load->Model('clientes_model');
                $this->load->Model('productos_model');
                $this->load->Model('proveedores_model');
                $this->load->Model('pedidos_model');
            
            if (!$this->session->userdata('id')) redirect("login");
        }

	public function index()
	{
		// en la plantilla cargar las urls
        
        // mostrar las variables de session en la parte superior de la vista
        $data["nombreusuario"]=$this->session->userdata('nombre')." ".$this->session->userdata('apellido');
         $data["idusuario"]=$this->session->userdata('id');
                // pasar vector con los totalesa de cada modelo invocado

          $data["totalclientes"]=$this->clientes_model->listar_registros();
        $data["totalproveedores"]=$this->proveedores_model->listar_registros();
        $data["totalproductos"]=$this->productos_model->listar_productos();
        $data["totalpedidos"]=$this->pedidos_model->listar_pedidos();
        
        // agregar datos para la grafica
        // 1 datos
        // mandar los 12 meses del año
        $data["meses"]=array(1,2,3,4,5,6,7,8,9,10,11,12);

        for ($i=0;$i<count($data["meses"]);$i++) {
        	$x=$this->pedidos_model->total_mes($data['meses'][$i]);
        }

		$this->load->view('home',$data);
	}
}






