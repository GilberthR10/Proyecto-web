<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Webservice extends CI_Controller {

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
                $this->load->Model('clientes_model');
                $this->load->Model('pedidos_model');

                $this->load->library('Nusoap_library');

            // creacion del webservice
            //  1. invocar la clase que me permite crear el servicio
            // en el server
            $this->server=new soap_server();
            // 2. configurar el WSDL
            // 2.1 ruta del WSDL
            $ruta='http://'.$_SERVER['HTTP_HOST']."/proyectoweb/index.php/webservices";
            $this->server->configureWSDL('listaclientes',$ruta);

            // 3. asignarle un namespace al servicio creado
            $this->server->wsdl->schemaTargetNamespace=$ruta;
            // 4. parametros de entrada
            $entrada=array('idusuario'=>"xsd:string");
            // 5. parametros de salida
            $salida=array("return"=>"xsd:string");
            // 6. definir un entorno de trabajo
            $namespace="urn:listaclientesWSDL";
            // 7. el soapaction 
            $soapaction="urn:$ruta/listaclientes";
            // 8. metodo de comunicacion
            // remote procedure call.
            // este metodo abre la comunicacion de dos puntos independiente de como ambos se conectan
            $rpc="rpc";
            // 9. uso del webservice
            $uso="encoded";
            // 10. titulo o documentacion del webservice
            $documentacion="Proceso de listado de clientes";
            // se procesde a registrar el servicio
            $this->server->register("listaclientes",$entrada,$salida,$namespace,$soapaction,$rpc,$uso,$documentacion);
            
            // PROCESO PARA REGISTRAR OTRO SERVICIO
            
            $entrada=array('idpedido'=>"xsd:string");
            // 5. parametros de salida
            $salida=array("return"=>"xsd:string");
            // 6. definir un entorno de trabajo
            $namespace="urn:listapedidosWSDL";
            // 7. el soapaction 
            $soapaction="urn:$ruta/listapedidos";
            $documentacion="Proceso de listado de pedidos";
            $this->server->register("listapedidos",$entrada,$salida,$namespace,$soapaction,$rpc,$uso,$documentacion);
            
        }
    
    
    function index(){
        
        function listaclientes($idusuario){
            $ci=& get_instance(); // reinstancia la clase principal de los controladores principales del ci
            $lista=$ci->clientes_model->listar_registros();
            $listaclientes=array();
            foreach($lista as $detalle) {
                $listaclientes[]=array(
                    
                    "nombres"=>$detalle["nombres"],
                    "apellidos"=>$detalle["apellidos"],
                    "documento"=>$detalle["documento"],
                    "correo"=>$detalle["correo"]
                );
            }
            
           
            return json_encode($listaclientes);
            
        }

        // crear la funcion lista pedidosa
        function listapedidos($idpedido){
            $ci=& get_instance(); // reinstancia la clase principal de los controladores principales del ci
            $lista=$ci->pedidos_model->listar_pedidos();
            $listapedidos=array();
    
            foreach($lista as $detalle) {
                $listapedidos[]=array(
                    "id"=>$detalle["id"],
                    "nombres"=>$detalle["nombres"]." ".$detalle["apellidos"],
                    "dsfecha"=>$detalle["dsfecha"],
                    "idcant"=>$detalle["idcant"],
                    "idvalort"=>$detalle["idvalort"]
                );
            }
            
           
            return json_encode($listapedidos);
            
        } 
        
        
        
        // metodo de recibir parametros desde una fuente remota
        $this->server->service(file_get_contents("php://input"));
        //echo listapedidos('');
        
    }


}