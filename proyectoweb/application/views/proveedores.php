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
            //if(isset($mensaje) echo $mensaje;)
            ?>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                      <?php
                        $ruta= site_url("proveedores/registro/");
                        $tituloboton="Nuevo registro";
                        include("includes/nuevo.php");?>  
                        <div class="panel-body">
            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        
                                        <th>Id</th>
                                        <th>Nombre</th>
                                        <th>Apellidos</th>
                                        <th>Documento</th>
                                        <th>Estado</th>
                                        <th>Correo</th>
                                        <th>Fecha</th>
                                        <th>Archivo</th>
                                        <th>Login</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                            <?php foreach($lista as $detalle_lista){?>
                                    <tr class="odd gradeX">
                        <td><?php echo $detalle_lista["id"];?></td>
                        <td><?php echo $detalle_lista["nombre"];?></td>
                        <td><?php echo $detalle_lista["apellidos"];?></td>
                        <td><?php echo $detalle_lista["documento"];?></td>
                        <td><?php  
                            if($detalle_lista["estado"] == "1")
                            {
                                echo "Activo";
                            }
                            else
                            {
                                echo "Inactivo";
                            }                                        
                                                                    
                            ?></td>
                        <td><?php echo $detalle_lista["correo"];?></td>
                        <td><?php echo $detalle_lista["fecha"];?></td>
                        <td><?php
                            if($detalle_lista["dsarchivo"]<>"")
                            {
                            
      $ruta="/cesde/imagenes/proveedores/".$detalle_lista["dsarchivo"];                          
                                
                                echo  "<a href='".$ruta."' target='_blank'>".$detalle_lista["dsarchivo"]."</a>";                         
                            }
                            else
                            {
                                echo "No hay adjunto";
                            }
                        ?></td>
                        <td><?php echo $detalle_lista["login"];?></td>
                                        <td class="center">
                       <?php
                        $modificar=site_url("proveedores/modificar/".$detalle_lista["id"]);
                        $eliminar=site_url("proveedores/eliminar/".$detalle_lista["id"]);                                            
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