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
if (isset($mensajes)) echo $mensajes;                 
            ?>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                      <?php
                        $ruta=site_url("clientes/registro/");
$tituloboton="Nuevo Registro";
                        include("includes/nuevo.php");
                        ?>  
                        <div class="panel-body">
            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>                                                                                                                        <th>Documento</th>
                                        <th>Nombre</th>
                                        <th>Apellidos</th>
                                        <th>Correo</th>
                                        <th>Archivo</th>
                                        
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                            <?php foreach($lista as $detalle_lista){?>
                                    <tr class="odd gradeX">
                        <td><?php echo $detalle_lista["documento"];?></td>
                        <td><?php echo $detalle_lista["nombres"];?></td>
                        <td><?php echo $detalle_lista["apellidos"];?></td>
                        <td><?php echo $detalle_lista["correo"];?></td>

                    <td><?php
                        if ($detalle_lista["dsarchivo"]<>"") {
                            echo $detalle_lista["dsarchivo"];
                        } else {
                            echo "No hay adjunto";
                        }
                        ?></td>

                                        
                                        <td class="center">
                       <?php 
                        $modificar=site_url("clientes/modificar/".$detalle_lista["id"]);
                                                                    
                        $eliminar=site_url("clientes/eliminar/".$detalle_lista["id"]);                                            
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