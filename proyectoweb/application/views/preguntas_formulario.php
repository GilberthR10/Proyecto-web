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
                        $ruta=site_url("preguntas/");
                            $tituloboton="Regresar";
                        include("includes/nuevo.php"); //Carga Include
                        
                        //mostrar los valores del registro seleccionado 
                          $forma=form_open_multipart("preguntas/registro/");
                        
                        if(isset($detalle)){
                            
                            foreach ($detalle as $detalle_lista_preguntas)
                            {
                                $pregunta=$detalle_lista_preguntas["pregunta"];
                                $respuesta=$detalle_lista_preguntas["respuesta"];
                                $id=$detalle_lista_preguntas["id"];
                            }
                            
                            $forma=form_open_multipart("preguntas/modificar/".$id);
                        }
   
                        ?>  
                        <div class="panel-body">

                        <?php echo $forma;?>    
                            
                            <input type="text" name="pregunta" placeholder="Ingrese La Pregunta" class="form-control" value="<?php if (isset($pregunta)) echo $pregunta;?>">
                            <br>
                        
                            <textarea name="respuesta" rows="10"  placeholder="Ingrese La Respuesta" class="form-control"><?php if (isset($respuesta)) echo $respuesta;?></textarea>
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