 <?=$this->load->view("default/_result_messages_modal")?>
<ul class="nav nav-tabs">
  <li class="active"><a href="#rubrosAsignados" data-toggle="tab">Rubros Asignados</a></li>
  <li><a href="#nuevoRubro" data-toggle="tab"
  	onClick="updateContent('<?=base_url()?>fuentes_rubros_controller/add_c/<?=$fuente_id?>','nuevoRubro')">Nuevo</a></li>
</ul>

<div class="tab-content">
  <div class="tab-pane active" id="rubrosAsignados"><?=$this->load->view('fuentes_rubros_view/record_list_fuentes_rubros')?></div>
  <div class="tab-pane" id="nuevoRubro"></div>
</div>


<script type="text/javascript">
	
	$(document).ready(function(){
		//$("#contentModalFooter").find(".btnBack").remove();
		//$("#extraContentHeader").find(".extraContentHeaderP").remove();
	});
</script>