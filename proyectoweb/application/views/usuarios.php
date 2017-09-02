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
                        $ruta=site_url("usuarios/registro/");
                            $tituloboton="Nuevo Registro";
                        include("includes/nuevo.php"); //Carga Include
                        ?>  
                        <div class="panel-body">
            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr><th>Foto</th>
                                        <th>Documento</th>
                                        <th>Nombre</th>
                                        <th>Apellidos</th>
                                        <th>Correo</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                            <?php foreach($lista as $detalle_lista_usuarios){?>
                                    <tr class="odd gradeX">
                                        
                                        <td><?php
                        if ($detalle_lista_usuarios["ftperfil"]<>"") {
                            echo $detalle_lista_usuarios["ftperfil"];
                        } else {
                            echo "No hay adjunto";
                        }
                        ?></td>
                                        
                        <td><?php echo $detalle_lista_usuarios["documento"];?></td>
                        <td><?php echo $detalle_lista_usuarios["nombres"];?></td>
                        <td><?php echo $detalle_lista_usuarios["apellidos"];?></td>
                        <td><?php echo $detalle_lista_usuarios["correo"];?></td>
                                        
                        
                                        <td class="center">
                       <?php 
                           $modificar=site_url("usuarios/modificar/".$detalle_lista_usuarios["id"]);
                                                                             
                             $eliminar=site_url("usuarios/eliminar/".$detalle_lista_usuarios["id"]);                                                  
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