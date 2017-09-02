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
                        $ruta= site_url("proveedores/");
                        $tituloboton="Regresar";
                        include("includes/nuevo.php");
                        //$forma=form_open("proveedores/registro/");
                        // Mostrar los valores del registro seleccionado
                        $forma=form_open_multipart("proveedores/registro/");
                        //cambiar form_open por el metodo de envio de archivos
                        if(isset($detalle))
                        {
                            foreach($detalle as $detalle_lista)
                            {
                                $nombre = $detalle_lista["nombre"];
                                $apellidos = $detalle_lista["apellidos"];
                                $documento = $detalle_lista["documento"];
                                $estado = $detalle_lista["estado"];
                                $correo = $detalle_lista["correo"];
                                $clave = $detalle_lista["clave"];
                                $id = $detalle_lista["id"];
                                $dsarchivo = $detalle_lista["dsarchivo"];
                            }
                            //$forma = form_open("proveedores/modificar/".$id);
                            $forma=form_open_multipart("proveedores/modificar/".$id);
                        }
                        ?>  
                        <div class="panel-body">
                            
                            
                            <?php echo $forma;?>
                                
                                <input value="<?php if (isset($nombre)) echo $nombre;?>" type="text" name="nombre" placeholder="Ingrese el nombre" class="form-control"/>
                                <p>&nbsp;</p>

                                <input value="<?php if(isset($apellidos)) echo $apellidos;?>"  type="text" name="apellidos" placeholder="Ingrese el apellido" class="form-control"/>
                                <p>&nbsp;</p>
                                
                                <input value="<?php if(isset($documento)) echo $documento;?>"  type="text" name="documento" placeholder="Ingrese el documento" class="form-control"/>
                                <p>&nbsp;</p>
                                
                                <!--<input value="<?php if(isset($estado)) echo $estado;?>" type="text" name="estado" placeholder="Ingrese el estado" class="form-control"/>
                                <p>&nbsp;</p>-->
                                
                                <select name="estado" placeholder="ingrese el estado" class="form-control">
                                    <option value="1">Activo</option>
                                    <option value="0">Inactivo</option>
                                </select>
                                <br> 
                                
                                <input value="<?php if(isset($correo)) echo $correo;?>" type="email" name="correo" placeholder="Ingrese el correo" class="form-control"/>
                                <p>&nbsp;</p>
                                
                                <input value="<?php if(isset($clave)) echo $clave;?>" type="password" name="clave" placeholder="Ingrese la clave" class="form-control"/>
                                <p>&nbsp;</p>

                                <label>Adjuntar documento de camara de comercio</label>
                                <br/>
                                <?php 
                                    if (isset($dsarchivo) && $dsarchivo <> "")
                                    {
                                        echo '<input type="file" name="dsarchivo" id="dsarchivo" style="color: transparent" title="'.$dsarchivo.'"/>';
                                        echo $dsarchivo;
                                    }
                                    else 
                                    {
                                        echo '<input type="file" name="dsarchivo" id="dsarchivo"/>';
                                    }
                                    ?>
                            <input type="hidden" name="anterior" value="<?php if (isset($dsarchivo))echo $dsarchivo;?>">
                            
                            <input type="hidden" name="claveactual" value="<?php if(isset($clave)) echo $clave;?>">
                                    

                             
                                
                            
                                <p>&nbsp;</p>    
                            
                                <p><br><input type="submit" name="submit" class="btn btn success" value="Guardar"></p>
                            
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