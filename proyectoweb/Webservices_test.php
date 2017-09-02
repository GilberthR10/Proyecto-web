<?php
include('application/libraries/nusoap_lib/nusoap.php');
$ruta = 'http://localhost:8089/proyectoweb/webservices.php?wsdl';
$client = new SoapClient($ruta);
$result = $client->listacliente(1);
        if ($client->fault) { 
            echo '<b>Error: '; 
            print_r($result); 
            echo '</b>'; 
        } else {
                echo '<pre>';
                echo '<br>********Respuesta del WebService ESTADO DE ENVIO ********<br>';
                echo '<br><br><a href="estado.envio.php">Regresar</a>';
                echo '<br><br> Codigo XML: (Dar click derecho sobre ver codigo fuente)';
                
                print_r(utf8_decode($result));              

                echo '<br>Respuesta leyendo el XML<br><br>';

                echo '</pre>';


        }
?>










