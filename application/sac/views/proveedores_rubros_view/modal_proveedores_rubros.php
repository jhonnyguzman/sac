<?php if($flag['r']): ?>
	
	<div class="modal-header" id="contentModalHeader">
	    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	    <h5 id="myModalLabel" >
	    	<span>Proveedor: <?=$proveedor->razon_social?></span>&nbsp;&nbsp;&nbsp;&nbsp;
	    	<span id="extraContentHeader"></span>
	    </h5>
	</div>
	<div class="modal-body" id="contentModal">
	   
	</div>
	<div class="modal-footer" id="contentModalFooter">
	</div>

	<script type="text/javascript">
	$(document).ready(function(){
		$("#contentModal").load("<?=base_url()?>proveedores_rubros_controller/show_c/<?=$proveedor->id?>");
	});
	</script>

<?php else: ?>
	<div class="modal-header">
	    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	    <h3 id="myModalLabel">Proveedor: <?=$proveedor->razon_social?></h3>
	</div>
	<div class="modal-body" id="contentModal">
	    <div class="alert">
		  <button type="button" class="close" data-dismiss="alert">×</button>
		  <strong>Alerta!</strong> No tienes permiso par realizar esta acción.
		</div>
	</div>
<?php endif;?>
