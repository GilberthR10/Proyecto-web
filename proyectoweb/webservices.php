<?php
header('Access-Control-Allow-Origin: *'); 
include('application/libraries/nusoap_lib/nusoap.php');
$server = new soap_server();
$server->configureWSDL('listaclientewsdl', 'urn:listaclientewsdl');
$server->register('listacliente',                // method name
    array('idusuario'=>'xsd:string'),// input parameters
    array('return' => 'xsd:string'),    // output parameters
    'urn:listaclientewsdl',                  // namespace
    'urn:listaclientewsdl#listacliente',              // soapaction
    'rpc',                              // style
    'encoded',                          // use
    'documentation'         // documentation
);
function listacliente($idusuario){
        // retornar json
    
        $data="111";
        $datax= new soapval('return', 'xsd:string',trim($data)); 
        return trim($data);
}
$server->service(file_get_contents("php://input"));
//echo listacliente("1");
?>
