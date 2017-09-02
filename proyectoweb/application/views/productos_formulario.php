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
                    $ruta=site_url("productos/");
                    $tituloboton="Regresar";
                    include("includes/nuevo.php");
                    //----$forma=form_open("productos/registro/");
                    //Cambiar form_open por el metodo de envio de archivos
                    $forma=form_open_multipart("productos/registro/");
                    if (isset($detalle)) {
                        foreach($detalle as $detalle_lista) 
                        {
                            $referencias=$detalle_lista["referencias"];
                            $nombre=$detalle_lista["nombre"];
                            $fecharegistro=$detalle_lista["fecharegistro"];
                            $existencias=$detalle_lista["existencias"];
                            $valor=$detalle_lista["valor"];
                            $proveedor=$detalle_lista["proveedor"];
                            $estado=$detalle_lista["estado"];
                            $impuesto=$detalle_lista["impuesto"];
                            $id=$detalle_lista["id"];
                            $dsarchivo=$detalle_lista["dsarchivo"];
                            $dsarchivop=$detalle_lista["dsarchivop"];
                        }
                        $forma=form_open_multipart("productos/modificar/".$id);
                    } 
                    ?>  
                    <div class="panel-body">
                        <?php echo $forma;?>              
                        <input type="text" name="referencias" placeholder="ingrese las referencias" class="form-control" value="<?php if (isset($referencias)) echo $referencias;?>">
                        <br>                        
                        <input type="text" name="nombre" placeholder="ingrese el nombre" class="form-control" value="<?php if (isset($nombre)) echo $nombre;?>">
                        <br>                                             
                        <input type="text" name="existencias" placeholder="ingrese las existencias" class="form-control"  value="<?php if (isset($existencias)) echo $existencias;?>">
                        <br>                            
                        <input type="text" name="valor" placeholder="ingrese el valor" class="form-control" value="<?php if (isset($valor)) echo $valor;?>">
                        <br>                            
                        <input type="text" name="impuesto" placeholder="ingrese el impuesto" class="form-control" value="<?php if (isset($impuesto)) echo $impuesto;?>">
                        <br>           
                        <input type="text" name="proveedor" placeholder="ingrese el proveedor" class="form-control" value="<?php if (isset($proveedor)) echo $proveedor;?>">      
                        <br>                            
                        <input type="text" name="estado" placeholder="ingrese el estado" class="form-control" value="<?php if (isset($estado)) echo $estado;?>">
                        <br>
                        <p>
                            <label>
                                Adjuntar imagen del producto (1200x1200 max)
                            </label>
                            <br>
                            <input type="file" name="dsarchivo">
                            <br>
                            <label>
                                Adjuntar imagen pequeña del producto (500x500 max)
                            </label>
                            <br>
                            <input type="file" name="dsarchivop">
                            
                            <input type="hidden" name="anterior" value="<?php if (isset($dsarchivo))echo $dsarchivo;?>">
                            <input type="hidden" name="anteriorp" value="<?php if (isset($dsarchivop))echo $dsarchivop;?>">
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