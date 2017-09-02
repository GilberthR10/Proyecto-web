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
            if (isset($mensajes)) echo $mensajes;      
            ?>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                       <?php
                        $ruta=site_url("pedidos/");
                        $tituloboton="Regresar";
                        include("includes/nuevo.php");
                     echo form_open_multipart("pedidos/registro/");
                        
                        ?> 
                           
                        <div class="panel-body">
                            
                                <div class="table-responsive">
                                    <table width="100%" class="table table-striped table-bordered table-hover table-responsive"         id="dataTables-example">
                                    <thead>
                                        <tr>                                                   
                                            <th>Referencias</th>
                                            <th>Nombre</th>
                                        
                                            <th>Existencias</th>
                                           
                                            <th>Proveedor</th>
                                            <th>Imagen</th>
<th>Valor</th>
<th>Impuesto</th>                                     <th>Cantidad</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                <?php foreach($lista as $detalle_lista){?>
                                        <tr class="odd gradeX">

                            <td>
 <input type='text' name="idreferencia[]" value="<?php echo $detalle_lista["referencias"];?>" size=5 readonly >                                   </td>
                            <td><?php echo $detalle_lista["nombre"];?></td>
                           
                            <td><?php echo $detalle_lista["existencias"];?></td>
                                                                   
                                            </td>
                         
                            <td><?php echo $detalle_lista["proveedor"];?></td>
                           
                          
                            <td>
                                <?php
                                    if($detalle_lista["dsarchivop"]<>"")
                                    {
                                     $imagen = $detalle_lista["dsarchivop"];

      $ruta="/proyectoweb/imagenes/productos/".$imagen;                                                                  
        echo "<img src='".$ruta."' width='100' heigth='100'>";

                                    }
                                    else
                                    {
                                        echo "No hay adjunto";
                                    }                               
                                ?>
                            </td>
 <td>
  <input type='text' name="idvalor[]" value="<?php echo $detalle_lista["valor"];?>" size=5 >   
                                        </td>
        <td><?php echo $detalle_lista["impuesto"];?></td>
                        <td>
                            <input type='text' name="idcant[]" value="1" size=4>
                            </td>
                                      </tr>

                                    <?php } ?>
                                </tbody>
                            </table>
                            <p><br>
<select name="idcliente">
   <?php foreach($listaclientes as $detalle_lista){?>
    <option value="<?php echo $detalle_lista["id"];?>"><?php echo $detalle_lista["nombres"].  " ".$detalle_lista["apellidos"];?></option>
    <?php  
                                          }?>
</select>                                
                                <input type="submit" name="submit" class="btn btn-success" value="Guardar Pedido"></p>
                        </form>
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