 <?=$this->load->view("default/_result_messages_modal")?>
<ul class="nav nav-tabs">
  <li class="active"><a href="#eventosAsignadas" data-toggle="tab">Eventos Asignados</a></li>
  <li><a href="#nuevoEvento" data-toggle="tab"
  	onClick="updateContent('<?=base_url()?>eventos_controller/add_c/<?=$proyecto_id?>','nuevoEvento')">Nuevo</a></li>
</ul>

<div class="tab-content">
  <div class="tab-pane active" id="eventosAsignadas"><?=$this->load->view('eventos_view/record_list_eventos')?></div>
  <div class="tab-pane" id="nuevoEvento"></div>
</div>


<script type="text/javascript">
	
	$(document).ready(function(){
		$("#contentModalFooter").find(".btnBack").remove();
		$("#extraContentHeader").find(".extraContentHeaderP").remove();
	});
</script>