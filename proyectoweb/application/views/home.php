<!DOCTYPE html>
<html lang="en">

<head>

  <?php include("includes/head.php");?>


</head>

<body>

    <div id="wrapper">

      <?php include("includes/menu.php")?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">BIENVENIDO
                    <?php if (isset($nombreusuario)) echo " ,".$nombreusuario;?>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php if (isset($totalclientes)) echo count($totalclientes);?></div>
                                    <div>Clientes</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo site_url("clientes/")?>">
                            <div class="panel-footer">
                                <span class="pull-left">Ver mas</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php if (isset($totalproveedores)) echo count($totalproveedores);?></div>
                                    <div>Proveedores</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo site_url("proveedores/")?>">
                            <div class="panel-footer">
                                <span class="pull-left">Ver detalles</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-shopping-cart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php if (isset($totalproductos)) echo count($totalproductos);?></div>
                                    <div>Productos</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo site_url("productos/")?>">
                            <div class="panel-footer">
                                <span class="pull-left">Ver detalles</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-support fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php if (isset($totalpedidos)) echo count($totalpedidos);?></div>
                                    <div>Pedidos</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo site_url("pedidos/")?>">
                            <div class="panel-footer">
                                <span class="pull-left">Ver detalles</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Comportamientos de pedidos en un año
                            <div class="pull-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                        Actions
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li><a href="#">Action</a>
                                        </li>
                                        <li><a href="#">Another action</a>
                                        </li>
                                        <li><a href="#">Something else here</a>
                                        </li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div id="morris-area-chart"></div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                    <!-- /.panel -->
                
                </div>
                <!-- /.col-lg-8 -->
                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bell fa-fw"></i> Soporte en linea                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="list-group">
                                <a href="<?php echo site_url("preguntas/ver/")?>" class="list-group-item">
                                    <i class="fa fa-comment fa-fw"></i> Preguntas Frecuentes
                                </a>
                                <a href="<?php echo site_url("soporte/registro/")?>" class="list-group-item">
                                    <i class="fa fa-twitter fa-fw"></i> Soporte
                                </a>
                            </div>
                            <!-- /.list-group -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                 
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <?php include("includes/js.php");?>
</body>
</html>
<script type="text/javascript">
$(function() {
    Morris.Area({
        element: 'morris-area-chart',
        data: [
        <?php for ($i=0;$i<count($meses);$i++) {?> 
        {
            period: '2010 p<?php echo $i?>',
            <?php 
            $cadena="";
            foreach($totalproductos as $detalle){
                $cadena.="'".$detalle["nombre"]."': 2666,";
            }
            $cadena=trim($cadena,",");
            echo $cadena;    
            ?>
                   
            
        },
        <?php } ?>

        ],          
        xkey: 'period',
            <?php 
            $cadena="";
            foreach($totalproductos as $detalle){
                $cadena.="'".$detalle["nombre"]."',";
            } 
            $cadena=trim($cadena,",");
            ?>
        ykeys: [<?php echo $cadena?>],
        labels: [<?php echo $cadena?>],
        pointSize: 2,
        resize: true
    });
});
   

</script>