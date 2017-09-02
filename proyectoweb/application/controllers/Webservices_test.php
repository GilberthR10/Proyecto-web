<?php
class Webservices_test extends CI_Controller {
		public function __construct()
        {
            parent::__construct();
        //  $this->ruta = 'http://localhost:8089/proyectoweb/index.php/webservices?wsdl';
           $this->ruta="http://www.uxagenciadigital.com/cesde/index.php/webservice"; 
           $this->load->library("Nusoap_library"); //cargando mi biblioteca
            $this->nusoap_client= new SoapClient($this->ruta); // invocando clase
             $this->load->helper("url");
    }

    // funcion que testea el resultado
    function index() {
                $result = $this->nusoap_client->listaclientes(1);
                // se devuelve en formato json
                //echo $result;
                // leerlo
                $data = json_decode(($result),true);
                print_r($data)."<hr>";
                foreach ($data as $key => $val) {
                    if(is_array($val)) {
                        
                        echo "$key:\n";
                        foreach ($val as $key1 => $val1) {
                            echo "$key1 => $val1\n";
                        
                        } 
                    } else {
                        echo "$key => $val\n";
                    }
                 }   
    }   
}
