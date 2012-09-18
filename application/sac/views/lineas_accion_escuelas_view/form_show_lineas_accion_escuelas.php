 <?=$this->load->view("default/_result_messages_modal")?>
<ul class="nav nav-tabs">
  <li class="active"><a href="#lineasAsignadas" data-toggle="tab">Lineas asignadas</a></li>
  <li><a href="#asignarLinea" data-toggle="tab"
  	onClick="updateContent('<?=base_url()?>lineas_accion_escuelas_controller/add_c/<?=$periodo_escuela_activo[0]->id?>/<?=$periodo_escuela_activo[0]->escuelas_id?>','asignarLinea')">Asignar</a></li>
</ul>

<div class="tab-content">
  <div class="tab-pane active" id="lineasAsignadas"><?=$this->load->view('lineas_accion_escuelas_view/list_lineas_accion_asignadas')?></div>
  <div class="tab-pane" id="asignarLinea"></div>
</div>


<script type="text/javascript">
	
	$(document).ready(function(){
		$("#contentModalFooter").find(".btnBack").remove();
		$("#extraContentHeader").find(".extraContentHeaderP").remove();
	});
</script>