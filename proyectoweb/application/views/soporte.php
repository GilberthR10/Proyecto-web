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
                        <div class="panel-body">
            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                    <th>ID</th>
                                    <th>Asunto</th>
                                    <th>Descripcion</th>
                                    <th>Correo</th>
                                    <th>Fecha</th>
                                    <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                            <?php foreach($lista as $detalle_lista){
$color="alert alert-danger";
if ($detalle_lista["solucion"]<>"") $color="alert alert-success"; 
                                ?>
                                    <tr class="odd gradeX">

    <td><?php echo $detalle_lista["id"];?></td>
    <td><?php echo ($detalle_lista["asunto"]);?></td>
    <td><?php echo str_replace("\n","<br>",$detalle_lista["descrip"]);?>
        <?php if ($detalle_lista["solucion"]<>"") echo "<br><small><strong>Solucion: ".$detalle_lista["solucion"]." (Fecha: ".$detalle_lista["fechasol"].")</strong></small>"?>

    </td>
    <td><?php echo ($detalle_lista["correo"]);?></td>
    <td><?php echo ($detalle_lista["fecha"]);?></td>
    <td nowrap class="<?php echo $color;?>"><strong><a href="<?php echo site_url('soporte/solucion/'.$detalle_lista["id"])?>">Dar Solucion</a></strong></td>
                
                                        
                        
                                    
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