<!DOCTYPE html>
<html lang="en">
<head>
<?php include("includes/head.php");?>
</head>
<body>
    <div id="wrapper">
<?php include("includes/menu.php")?>
        <div id="page-wrapper">
           <?php include("includes/titulo.php");?>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                      <?php
                        $ruta=site_url("preguntas/registro/");
                            $tituloboton="Nuevo Registro";
                        include("includes/nuevo.php"); //Carga Include
                        ?>  
                        <div class="panel-body">
            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr><th>Pregunta</th>
                                        <th>Respuesta</th>
                
                                    </tr>
                                </thead>
                                <tbody>
                            <?php foreach($lista as $detalle_lista_usuarios){?>
                                    <tr class="odd gradeX">
                                        
                      
                                        
                        <td><?php echo $detalle_lista_usuarios["pregunta"];?></td>
                        <td><?php echo substr($detalle_lista_usuarios["respuesta"],0,100);?>...</td>
                
                                        
                        
                                        <td class="center">
                       <?php 
                           $modificar=site_url("preguntas/modificar/".$detalle_lista_usuarios["id"]);
                                                                             
                             $eliminar=site_url("preguntas/eliminar/".$detalle_lista_usuarios["id"]);                                                  
                        include("includes/enlaces.php");?>                  
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
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