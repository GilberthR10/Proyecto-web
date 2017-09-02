<?php 
/* script que invoca el boton nuevo registro y el total de datos encontrados */
?>  
 <div class="panel-heading">
    <?php if (isset($lista)) echo count($lista)." Registros encontrados.";?>
     
<button type="button" class="btn btn-default" style="float:right" onclick="location.href='<?php echo $ruta;?>'"><?php echo $tituloboton;?></button>

                        </div>