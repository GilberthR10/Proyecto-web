<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pedidos_model extends CI_Model 
{

    function __construct(){

    $this->load->database();

    }

    function listar_pedidos(){

        // se debe cruzar la tabla de clientes con la tabla de pedidos 
        // para mostrar el cliente y no el id cliente
        // se usa el comando select
        $this->db->select('b.nombres,b.apellidos,a.*');
        $this->db->from('tblpedidose a');
        $this->db->join('tblclientes b','a.idcliente=b.id');
        $query = $this->db->get();

        return $query->result_array();

    }
// funcion que me permita ingresar los datos del formulario en la tabla
    function ingresar(){

        // el proceso de insercion del pedido usa los campos en []
        // se debe recorrer el vector para guardar en tblpedidosc y luego en tblpedidosc
        $idcliente=$this->input->post('idcliente');
        // generar un idconsec de chequeo para consultar posterior
        $dsconsec=mt_rand();
        
        // por medio de for o de for each y por cada uno realizar la insercion
        // crear contadores para guadar la cantida total y el valor total
        $cantidad=0;
        $valort=0;
        for ($i=0;$i<count($this->input->post('idcant'));$i++) {
            
           $data=array(
            'dsconsec'=>$dsconsec,
            'idreferencia'=>$this->input->post('idreferencia')[$i],
            'idcant'=>$this->input->post('idcant')[$i],
            'idvalort'=>$this->input->post('idvalor')[$i]


            );      
            $cantidad=$cantidad+$this->input->post('idcant')[$i];
            $valort=$valort+($this->input->post('idcant')[$i]*$this->input->post('idvalor')[$i]);
            
            $this->db->insert("tblpedidosc",$data);
            
        }
        
        // guardar en tblpedidose
        
          $data=array(
            'dsconsec'=>$dsconsec,
            'idcliente'=>$this->input->post('idcliente'),
            'idcant'=>$cantidad,
            'idvalort'=>$valort,
            'dsfecha'=>date("Y-m-d H:i:s")
            );    
        
        $this->db->insert("tblpedidose",$data);
        
        // retornar el idpedido que seria un select con el dsconsec
        
        $this->db->where("dsconsec",$dsconsec);
        $query = $this->db->get('tblpedidose'); 
        return $query->result_array(); // Retornar Resultado
        
        
    }
    
    function modificar($id,$nombre_archivo,$nombre_archivo_pequeno) 
    {
    
    }
    function eliminar($id) 
    {
        
        // traer el dsconsec para eliminar en tblpedidosc
        
        $this->db->where("id",$id);
        $query = $this->db->get('tblpedidose'); 
        $data=$query->result_array();
        foreach($data as $data_lista){
            $dsconsec=$data_lista["dsconsec"];
        }
        
        $this->db->where("id",$id);
        $this->db->delete("tblpedidose");
        
        // borrar detalle del pedido
        $this->db->where("dsconsec",$dsconsec);
        return $this->db->delete("tblpedidosc");
        
    }
  // funcion que al pasar un id retorne un array con los datos de un solo registro
    function detalle_registro($id) {

        $this->db->where("id",$id);
        $query = $this->db->get('tblpedidose'); 
        return $query->result_array(); // Retornar Resultado

    }

    // funcion que carga los pedidos basado en una fecha o un mes
    function total_mes($mes) {

            if (strlen($mes)<2) $mes="0".$mes;
            // crear el intervalo de fecha inicial y fecha final por mes
            $dsfecha1=date("Y")."-".$mes."-01 00:00:00";
            $dsfecha2=date("Y")."-".$mes."-31 00:00:00";



            $sql=" select sum(a.idcant*a.idvalort) as total,c.nombre";
            $sql.=" from tblpedidosc a inner join tblpedidose b  ";
            $sql.=" on a.dsconsec=b.dsconsec ";

            $sql.=" inner join tblproductos c on c.referencias=a.idreferencia ";

            $sql.=" where b.dsfecha between '$dsfecha1' and '$dsfecha2' ";
            $sql.=" group by c.nombre ";

            $query=$this->db->query($sql);
            return $query->result_array(); // Retornar Resultado

    }
    

}
?>