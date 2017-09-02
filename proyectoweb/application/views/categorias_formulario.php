<!DOCTYPE html>
<html lang="en">
<head>
<?php include("includes/head.php");?>
</head>
<body>
    <div id="wrapper">
<?php include("includes/menu.php")?>
        <div id="page-wrapper">
           <?php include("includes/titulo.php");
            echo validation_errors();
            echo $mensajes;
            ?>
            
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                      <?php
						$ruta=site_url("categorias/");
						$tituloboton="Regresar";
						
						include("includes/nuevo.php");

// mostrar los valores del registro seleccionado
$forma=form_open("categorias/registro/");
                        
if (isset($detalle)) {
    foreach($detalle as $detalle_lista) {
            $nombre=$detalle_lista["nombre"];
            $estado=$detalle_lista["estado"];
            $id=$detalle_lista["id"];
            
    } 
   
    $forma=form_open("categorias/modificar/".$id);

    
}                        
                        
                        ?>  
                        <div class="panel-body">
   
    <?php echo $forma;?>
					
						
						
						<input type="text" name="nombre" placeholder="ingrese el nombre" class="form-control" value="<?php if (isset($nombre)) echo $nombre;?>">
						<br>
						
						<!--<input type="number" name="estado" placeholder="ingrese el estado" class="form-control" value="<?php if (isset($estado)) echo $estado;?>">
						<br>-->
                            
                        <select name="estado" placeholder="ingrese el estado" class="form-control">
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                        </select>
                        <br>    
                        
                        <p><input type="submit" name="submit" class="btn btn-success" value="Guardar"></p>
                            <!--</form>-->
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