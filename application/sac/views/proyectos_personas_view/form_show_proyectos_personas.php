 <?=$this->load->view("default/_result_messages_modal")?>
<ul class="nav nav-tabs">
  <li class="active"><a href="#personasAsignadas" data-toggle="tab">Personas Asignadas</a></li>
  <li><a href="#asignarPersona" data-toggle="tab"
  	onClick="updateContent('<?=base_url()?>proyectos_personas_controller/add_c/<?=$proyecto_id?>','asignarPersona')">Asignar</a></li>
</ul>

<div class="tab-content">
  <div class="tab-pane active" id="personasAsignadas"><?=$this->load->view('proyectos_personas_view/record_list_proyectos_personas')?></div>
  <div class="tab-pane" id="asignarPersona"></div>
</div>


<script type="text/javascript">
	
	$(document).ready(function(){
		//$("#contentModalFooter").find(".btnBack").remove();
		//$("#extraContentHeader").find(".extraContentHeaderP").remove();
	});
</script>