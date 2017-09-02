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
                        $ruta=site_url("categorias/registro/");
                        $tituloboton="Nuevo Registro";
                        include("includes/nuevo.php");
                        ?>  
                        <div class="panel-body">
            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>                                                                                              
                                        <th>Id</th>
                                        <th>Nombre</th>
                                        <th>Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                            <?php foreach($lista as $detalle_lista){?>
                                    <tr class="odd gradeX">
                        <td><?php echo $detalle_lista["id"];?></td>
                        <td><?php echo $detalle_lista["nombre"];?></td>
                        <td><?php echo $detalle_lista["estado"];?></td>
                                        <td class="center">
                                            
                        <?php 
                        $modificar=site_url("categorias/modificar/".$detalle_lista["id"]);
                                                                    
                        $eliminar=site_url("categorias/eliminar/".$detalle_lista["id"]);
                        
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