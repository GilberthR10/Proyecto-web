<!DOCTYPE html>
<html lang="en">
<head>
<?php include("includes/head.php");?>
</head>
<body>
    <div id="wrapper">
<?php //include("includes/menu.php")?>
        <div id="page-wrapper">
           <?php 
    include("includes/titulo.php");
    echo validation_errors();
        echo $mensajes;        
            ?>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                      <?php

                      $ruta=site_url("./home/");
$tituloboton="Regresar Principal";

                        
                        
                        //mostrar los valores del registro seleccionado 
                          $forma=form_open_multipart("soporte/registro/");
$readonly="";                          
                        
if (isset($detalle)) {
    foreach($detalle as $detalle_lista) {
            $asunto=$detalle_lista["asunto"];
            $descrip=$detalle_lista["descrip"];
            $correo=$detalle_lista["correo"];
            $solucion=$detalle_lista["solucion"];
            $fechasol=$detalle_lista["fechasol"];

            $id=$detalle_lista["id"];
    } 
   $readonly=" readonly ";
    $forma=form_open("soporte/solucion/".$id);

$tituloboton="Regresar listado";
                      $ruta=site_url("soporte/");

    
}                      
                        include("includes/nuevo.php");
   
                        ?>  
                        <div class="panel-body">

                        <?php echo $forma;?>    
                            
                            <input type="text" name="asunto" placeholder="Ingrese el asunto" class="form-control" value="<?php if (isset($asunto)) echo $asunto;?>" <?php echo $readonly?>>
                            <br>
                        
                            <textarea name="descrip" rows="10"  placeholder="Ingrese la descripcion de su inquetud" class="form-control" <?php echo $readonly?>><?php if (isset($descrip)) echo $descrip;?></textarea>
                            <br>
                            <input type="text" name="correo" placeholder="Ingrese su correo electronico" class="form-control" value="<?php if (isset($correo)) echo $correo;?>" <?php echo $readonly?>>
    <?php if (isset($detalle)) { ?>
        <br>
                            <textarea name="solucion" rows="10"  placeholder="Ingrese la solucion" class="form-control"><?php if (isset($solucion)) echo $solucion;?></textarea>
                            <?php if (isset($fechasol) && $fechasol<>"") { ?>
                                <br><span class="alert alert-success">Ultima Fecha de Solucion: <strong><?php echo $fechasol?></strong></span>
                            <?php } ?>

                            <br>

    <?php } ?>                            
                            <br>
                            
                                <p><br><input type="submit" name="submit" class="btn btn-success" value="Registrar"></p>


                            <p>&nbsp;</p>     
                            
                         <?php include("includes/ayuda.php");?> 
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
 <?php include("includes/js.php");?> <!-- Carga include -->
    
</body>
</html>