<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

class Restserver extends REST_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->database();
        $this->load->helper('url');
    }


// se accede con http://miservidor/restserver/listaclientes?format=json
    public function clientes_get() {
        $this->load->model('clientes_model');
        $this->response($this->clientes_model->listar_registros());
    }

// se accede con http://miservidor/restserver/pedidos?format=json
    public function pedidos_get() {
            $this->load->Model('pedidos_model');
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
                    $this->response($listapedidos);
    }

}