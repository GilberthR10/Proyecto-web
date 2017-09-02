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
      
                                <div class="panel-group" id="accordion">

                                    <?php 
                                    $i=0;
                                    foreach($lista as $detalle_lista_usuarios){
                                      $i++;  
                                      $in="";
                                     // if ($i==1) $in="in";
                                        ?>
                                <div class="panel panel-default">

                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i?>"><?php echo $detalle_lista_usuarios["pregunta"];?></a>
                                        </h4>
                                    </div>
                                    <div id="collapse<?php echo $i?>" class="panel-collapse collapse <?php echo $in?>">
                                        <div class="panel-body">
    <?php echo str_replace("\n","<br>",$detalle_lista_usuarios["respuesta"]);?>
                                        </div>
                                    </div>
                                </div>    

                                 <?php } ?>
                              </div>

      
                            <!-- /.table-responsive -->
                         <?php include("includes/ayuda.php");?> 
                        </div>

                    </div>

                        <!-- /.panel-body -->
            
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