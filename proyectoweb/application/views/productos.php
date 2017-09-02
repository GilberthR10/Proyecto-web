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
                        $ruta=site_url("productos/registro/");
                        $tituloboton="Nuevo Registro";
                        include("includes/nuevo.php");
                        ?> 
                           
                        <div class="panel-body">
                            
                                <div class="table-responsive">
                                    <table width="100%" class="table table-striped table-bordered table-hover table-responsive"         id="dataTables-example">
                                    <thead>
                                        <tr>                                                   
                                            <th>Referencias</th>
                                            <th>Nombre</th>
                                            <th>Fecha de Registro</th>
                                            <th>Existencias</th>
                                            <th>Valor</th>
                                            <th>Impuesto</th>
                                            <th>Proveedor</th>
                                            <th>Estado</th>
                                            <th>Archivo</th>
                                            <th>Archivo Pequeño</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                <?php foreach($lista as $detalle_lista){?>
                                        <tr class="odd gradeX">

                            <td><?php echo $detalle_lista["referencias"];?></td>
                            <td><?php echo $detalle_lista["nombre"];?></td>
                            <td><?php echo $detalle_lista["fecharegistro"];?></td>
                            <td><?php echo $detalle_lista["existencias"];?></td>
                            <td><?php echo $detalle_lista["valor"];?></td>
                            <td><?php echo $detalle_lista["impuesto"];?></td>
                            <td><?php echo $detalle_lista["proveedor"];?></td>
                            <td><?php echo $detalle_lista["estado"];?></td>
                            <td>
                                <?php
                                    if($detalle_lista["dsarchivo"]<>"")
                               {
        $imagen = $detalle_lista["dsarchivo"];

      $ruta="/cesde/imagenes/productos/".$imagen;                                                                  
        echo "<img src='".$ruta."' width='150' heigth='150'>";
                                    }
                                    else
                                    {
                                        echo "No hay adjunto";
                                    }                               
                                ?>
                            </td>
                            <td>
                                <?php
                                    if($detalle_lista["dsarchivop"]<>"")
                                    {
                                     $imagen = $detalle_lista["dsarchivop"];

      $ruta="/cesde/imagenes/productos/".$imagen;                                                                  
        echo "<img src='".$ruta."' width='100' heigth='100'>";

                                    }
                                    else
                                    {
                                        echo "No hay adjunto";
                                    }                               
                                ?>
                            </td>

                            <td class="center">
                            <?php
                                $modificar=site_url("productos/modificar/".$detalle_lista["id"]);                                                           
                                $eliminar=site_url("productos/eliminar/".$detalle_lista["id"]);
                                include("includes/enlaces.php");?>                  
                            </td>
                                      </tr>

                                    <?php } ?>
                                </tbody>
                            </table>
                            </div>
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