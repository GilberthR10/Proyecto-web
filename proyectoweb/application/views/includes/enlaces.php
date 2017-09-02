<?php
 /* Script que invoca los enlaces en las tablas
 de las vistas
 */ 
?>
<a href="<?php if (isset($modificar)) echo $modificar;?>" title="Click para editar"><p class="fa fa-edit"></p></a>
<p class="fa fa-undo"></p>
<a data-toggle="modal" data-target="#myModal" onclick="cargar_ruta('<?php if (isset($eliminar)) echo $eliminar?>');"><p class="fa fa-trash-o"></p></a>
