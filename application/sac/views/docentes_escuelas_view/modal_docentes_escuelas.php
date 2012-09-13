<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Docentes de la escuela  </h3>
 </div>
<div class="modal-body" id="contentModal">
   
</div>
<div class="modal-footer">
</div>

<script type="text/javascript">
$(document).ready(function(){
	$("#contentModal").load("<?=base_url()?>docentes_escuelas_controller/show_c/<?=$escuelas_id?>");
});
</script>