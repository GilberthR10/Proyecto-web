<!DOCTYPE html>
<html lang="en">
<head>
<?php include("includes/head.php");?>
</head>
<body>
    <div id="wrapper">
<?php //include("includes/menu.php")?>
        <div id="page-wrapper">
           <?php include("includes/titulo.php");
            ?>
            
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                      <?php
						$ruta=site_url("categorias/");
						$tituloboton="Regresar";
						
						//include("includes/nuevo.php");

// mostrar los valores del registro seleccionado
$forma=form_open("login/acceso/");
                      
                        
                        ?>  
                        <div class="panel-body">
   
    <?php echo $forma;?>
					
						
						
						<input type="text" name="correo" placeholder="ingrese su correo" class="form-control" value="">
						<br>
					
                       <input type="password" name="clave" placeholder="ingrese su clave" class="form-control" value="">
						<br>
                            
                        <p><input type="submit" name="submit" class="btn btn-success" value="iNGRESAR"></p>
                            </form>
                        <p>&nbsp;</p>
                            
                            <!-- /.table-responsive -->
                         <?php
                        $bloqueo=1;
                        include("includes/ayuda.php");?> 
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