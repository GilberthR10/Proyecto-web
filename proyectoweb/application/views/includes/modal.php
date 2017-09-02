<?php 
/* Script o capa que muestra el mensaje de advertencia antes de borrar */
?>  
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Esta seguro de eliminar el registro?</h4>
                                        </div>
                                        <div class="modal-body">
                                            Recuerde que estos datos no se pueden recuperar
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                            <a href=""  class="btn btn-primary" id="id-eliminar">Aplicar</a>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>