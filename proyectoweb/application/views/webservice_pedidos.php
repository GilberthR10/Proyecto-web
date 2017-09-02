<!DOCTYPE html>
<html lang="en">
<head>
<?php include("includes/head.php");?>
</head>
<body>
    <div id="wrapper">
<?php //include("includes/menu.php")?>
        <div id="page-wrapper">
           <?php include("includes/titulo.php");
             if (isset($mensajes)) echo $mensajes;      
            ?>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                       <?php
                        ?> 
                           
                        <div class="panel-body">
                            
                                <div class="table-responsive">
                                    <table width="100%" class="table table-striped table-bordered table-hover table-responsive"         id="dataTables-example">
                                    <thead>
                                        <tr>                                                   
                                            <th>Numero</th>
                                            <th>Cliente</th>
                                            <th>Fecha de Registro</th>
                                            <th>Cantidad</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                <?php foreach($lista as $detalle_lista){?>
                                        <tr class="odd gradeX">

                            <td><?php echo $detalle_lista["id"];?></td>
                            <td><?php echo $detalle_lista["nombres"];?></td>
                           
                            <td><?php echo $detalle_lista["dsfecha"];?></td>
                            <td><?php echo $detalle_lista["idcant"];?></td>
                            <td><?php echo $detalle_lista["idvalort"];?></td>
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