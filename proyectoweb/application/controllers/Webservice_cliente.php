<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Webservice_cliente extends CI_Controller {

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
            $this->load->Model('globables_model');
            $this->load->helper('url_helper');
            $this->ruta="./imagenes/clientes";
            $this->load->library('Nusoap_library');
            // creacion del webservice pero tipo cliente
            // configurar ruta de acceso al servicio web
            // que se desee
//            $ruta="http://localhost:8089/proyectoweb/index.php/webservice?wsdl";
            $ruta="http://www.uxagenciadigital.com/cesde/index.php/webservice?wsdl";
            $this->cliente=new SoapClient($ruta);
        }
    
    
    function index(){
        
        // invocar el servicio creado y extrayendo el metodo listaclientes
        $resultado=$this->cliente->listaclientes(0);
       // 1. como sabem que el resultado viene en json, entonces decodificar la respuesta
        $data1=json_decode($resultado,true);
         $data["titulo"]="Webservices Clientes";
        $data["descripcion"]="Este modulo ver los clientes extraidos de un servicio web";
        $data["imagen"]="clientes.jpg";
        // traer todos los datos de la tabla
        $data["lista"]=$data1;
        $this->load->view('webservice_clientes',$data);
// 2. recorrer el primer foreach que permite leer cada linea de datos que trae elo json decodificado
 /*       print_r($data);
        echo "<hr>";
        foreach ($data as $llave=>$item) {
            
            //echo $llave." -- ".$item."<hr>";
            // 3. por cada fila  de item como es un array asociativo
                foreach($item as $llave1=>$item2) {
                    
                    echo $llave1." -- ".$item2."<hr>";
                    
                }
            
        }
*/    
        
        
        
        
        
    }
    
     function listapedidos(){
        
        // invocar el servicio creado y extrayendo el metodo listaclientes
        $resultado=$this->cliente->listapedidos(0);
       // 1. como sabem que el resultado viene en json, entonces decodificar la respuesta
        $data1=json_decode($resultado,true);
       $data["titulo"]="Listado de Pedidos desde webservices";
        $data["descripcion"]="Modulo que permite ver los pedidos cargados desde el webservice";
        $data["imagen"]="productos.png";
        // traer todos los datos de la tabla
        $data["lista"]=$data1;
        $this->load->view('webservice_pedidos',$data);
        
        
    }



}