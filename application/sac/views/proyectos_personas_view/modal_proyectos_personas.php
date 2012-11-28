<?php if(count($personas)>0): ?>
	
	<div class="modal-header" id="contentModalHeader">
	    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	    <h5 id="myModalLabel" >
	    	<span>Proyecto: <?=$proyecto->nombre?></span>&nbsp;&nbsp;&nbsp;&nbsp;
	    	<span id="extraContentHeader"></span>
	    </h5>
	</div>
	<div class="modal-body" id="contentModal">
	   
	</div>
	<div class="modal-footer" id="contentModalFooter">
	</div>

	<script type="text/javascript">
	$(document).ready(function(){
		$("#contentModal").load("<?=base_url()?>proyectos_personas_controller/show_c/<?=$proyecto->id?>");
	});
	</script>

<?php else: ?>
	<div class="modal-header">
	    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	    <h3 id="myModalLabel">Proyecto: <?=$proyecto->nombre?></h3>
	</div>
	<div class="modal-body" id="contentModal">
	    <div class="alert">
		  <button type="button" class="close" data-dismiss="alert">×</button>
		  <strong>Alerta!</strong> <?=$this->config->item('proyectos_personas_flash_error_message_01')?>
		</div>
	</div>
<?php endif;?>