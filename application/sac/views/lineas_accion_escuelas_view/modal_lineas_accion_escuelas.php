<?php if(count($periodo_escuela)>0): ?>
	
	<div class="modal-header" id="contentModalHeader">
	    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	    <h5 id="myModalLabel" >
	    	<span>Esc. <?=$escuela->nombre?></span>&nbsp;&nbsp;&nbsp;&nbsp;
	    	<span>Periodo Activo: <?=$periodo_escuela[0]->periodo_fecha_inicio.' - '.$periodo_escuela[0]->periodo_fecha_fin?></span>
	    	<span id="extraContentHeader"></span>
	    </h5>
	</div>
	<div class="modal-body" id="contentModal">
	   
	</div>
	<div class="modal-footer" id="contentModalFooter">
	</div>

	<script type="text/javascript">
	$(document).ready(function(){
		$("#contentModal").load("<?=base_url()?>lineas_accion_escuelas_controller/show_c/<?=$escuela->id?>");
	});
	</script>

<?php else: ?>
	<div class="modal-header">
	    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	    <h3 id="myModalLabel">Esc. <?=$escuela->nombre?></h3>
	</div>
	<div class="modal-body" id="contentModal">
	    <div class="alert">
		  <button type="button" class="close" data-dismiss="alert">×</button>
		  <strong>Alerta!</strong> <?=$this->config->item('lineas_accion_escuelas_flash_error_message_01')?>
		</div>
	</div>
<?php endif;?>