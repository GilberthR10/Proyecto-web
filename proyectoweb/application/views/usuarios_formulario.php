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
                        $ruta=site_url("usuarios/");
                            $tituloboton="Regresar";
                        include("includes/nuevo.php"); //Carga Include
                        
                        //mostrar los valores del registro seleccionado 
                          $forma=form_open_multipart("usuarios/registro/");
                        
                        if(isset($detalle)){
                            
                            foreach ($detalle as $detalle_lista_usuarios)
                            {
                                $ftperfil=$detalle_lista_usuarios["ftperfil"];
                                $documento=$detalle_lista_usuarios["documento"];
                                $nombres=$detalle_lista_usuarios["nombres"];
                                $apellidos=$detalle_lista_usuarios["apellidos"];
                                $correo=$detalle_lista_usuarios["correo"];
                                $id=$detalle_lista_usuarios["id"];
                            }
                            
                            $forma=form_open_multipart("usuarios/modificar/".$id);
                            
                            
                        }
                        
                        
                        
                        ?>  
                        <div class="panel-body">
                            
                            
                            
   
                        <?php echo $forma;?>    
                            
                            
                            <p><label> Agregar Foto</label>
                                <br>
                                <input type="file" name="ftperfil">
                                <input type="hidden" name="anterior" value="<?php if (isset($ftperfil))echo $ftperfil;?>">
                            </p>    
       
                            <input type="text" name="nombres" placeholder="Ingrese El Nombre Del Usuario" class="form-control" value="<?php if (isset($nombres)) echo $nombres;?>">
                            <br>
                        
                            <input type="text" name="apellidos" placeholder="Ingrese Los Apellidos Del Usuario" class="form-control" value="<?php if (isset($apellidos)) echo $apellidos;?>">
                            <br>

                            <input type="text" name="documento" placeholder="Ingrese documento" 
                            class="form-control"value="<?php if (isset($documento)) echo $documento;?>">
                            <br>
                            
                            <input type="text" name="correo" placeholder="Ingrese El Correo Electronico" class="form-control"value="<?php if (isset($correo)) echo $correo;?>">
                            <br>
                            
                                <p><br><input type="submit" name="submit" class="btn btn-success" value="Guardar"></p>

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