<?php 
/* script que invoca la ayuda dle modulo */
?>  
<div class="well">
<h4>Ayuda</h4>
<p><?php echo $descripcion?></p>
<?php if (!isset($bloqueo)) {?><a class="btn btn-default btn-lg btn-block" target="_blank" href="">Manual del sistema</a><?php }?>
</div>
<?php include("modal.php");?> 
