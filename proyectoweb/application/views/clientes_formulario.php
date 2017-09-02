<!DOCTYPE html>
<html lang="en">
<head>
<?php include("includes/head.php");?>
</head>
<body>
    <div id="wrapper">
<?php include("includes/menu.php")?>
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
                        $ruta=site_url("clientes/");
$tituloboton="Regresar";
                        include("includes/nuevo.php");
                        
// mostrar los valores del registro seleccionado
//$forma=form_open("clientes/registro/");
// cambiar form_open por el metodo de envio de archivos
$forma=form_open_multipart("clientes/registro/");
               
if (isset($detalle)) {
    foreach($detalle as $detalle_lista) {
            $documento=$detalle_lista["documento"];
            $nombres=$detalle_lista["nombres"];
            $apellidos=$detalle_lista["apellidos"];
            $correo=$detalle_lista["correo"];
            $id=$detalle_lista["id"];
            $dsarchivo=$detalle_lista["dsarchivo"];
        
    } 
    //$forma=form_open("clientes/modificar/".$id);
    $forma=form_open_multipart("clientes/modificar/".$id);
}                        
                        ?>  
                        <div class="panel-body">
   
    <?php echo $forma;?>   
       
       
                            <input type="text" name="nombres" placeholder="ingrese el nombre" class="form-control" value="<?php if (isset($nombres)) echo $nombres;?>">
       <br>
                        
                            <input type="text" name="apellidos" placeholder="ingrese los apellidos" class="form-control" value="<?php if (isset($apellidos)) echo $apellidos;?>">
       <br>
                            
                            
                            <input type="text" name="documento" placeholder="ingrese el documento" class="form-control" value="<?php if (isset($documento)) echo $documento;?>">
       <br>
                            
                           
                            <input type="text" name="correo" placeholder="ingrese el correo" class="form-control" value="<?php if (isset($correo)) echo $correo;?>">
<br>
<p><label>
    Adjuntar documento de camara de comercio</label>
    <br>
    <input type="file" name="dsarchivo">
    <input type="hidden" name="anterior" value="<?php if (isset($dsarchivo))echo $dsarchivo;?>">
    
                            </p>                            
       
       <p><br><input type="submit" name="submit" class="btn btn-success" value="Guardar"></p>
                            </form>
                            <p>&nbsp;</p>     
                            
                            <!-- /.table-responsive -->
                         <?php include("includes/ayuda.php");?> 
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
 <?php include("includes/js.php");?>
</body>
</html>