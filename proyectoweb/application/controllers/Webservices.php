<?php
class Webservices extends CI_Controller {
		public function __construct()
        {
            parent::__construct();
            $ns = 'http://'.$_SERVER['HTTP_HOST'].'/index.php/webservices/';
            $this->load->Model('clientes_model');
            $this->load->library("Nusoap_library"); //cargando mi biblioteca
            $this->nusoap_server = new soap_server(); // invocando clase
            $this->nusoap_server->configureWSDL("listaclientes", $ns); // crear WSDL
            $this->nusoap_server->wsdl->schemaTargetNamespace = $ns; // Agregar namespace
            // registrar parametros de entrada, funciones y metodos de respuesta
            //registrando funciones
            // entrada
            $input_array = array ('idusuario' => "xsd:string");
            // respuesta
            $return_array = array ("return" => "xsd:string");
            $this->nusoap_server->register('listaclientes', $input_array, $return_array, "urn:listaclientesWSDL", "urn:".$ns."/listaclientes", "rpc", "encoded", "Listado de clientes");
    }
	public function index()
	{
        // en el index crear funcion que maneje el lista clientes
        function listaclientes($idusuario){
            // traer los clientes en formato json
                $ci =& get_instance(); // reintancia la clase 
                $lista=$ci->clientes_model->listar_registros();
                $clientes=array();
                foreach($lista as $detalle_lista) {
                    $clientes[]=array(
                        "nombres"=>$detalle_lista["nombres"],
                        "apellidos"=>$detalle_lista["apellidos"],
                        "documento"=>$detalle_lista["documento"],
                    );
                }
                $data=array(
                    "data"=>$clientes
                    );

                return json_encode($clientes);
        }
        //echo listaclientes(1);
        $this->nusoap_server->service(file_get_contents("php://input"));
    }
}