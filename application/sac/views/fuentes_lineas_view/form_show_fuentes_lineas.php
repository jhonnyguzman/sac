 <?=$this->load->view("default/_result_messages_modal")?>
<ul class="nav nav-tabs">
  <li class="active"><a href="#lineasCargadas" data-toggle="tab">Lineas</a></li>
  <li><a href="#nuevaLinea" data-toggle="tab"
  	onClick="updateContent('<?=base_url()?>fuentes_lineas_controller/add_c/<?=$fuente_id?>','nuevaLinea')">Nueva</a></li>
</ul>

<div class="tab-content">
  <div class="tab-pane active" id="lineasCargadas"><?=$this->load->view('fuentes_lineas_view/record_list_fuentes_lineas')?></div>
  <div class="tab-pane" id="nuevaLinea"></div>
</div>


<script type="text/javascript">
	
	$(document).ready(function(){
		//$("#contentModalFooter").find(".btnBack").remove();
		//$("#extraContentHeader").find(".extraContentHeaderP").remove();
	});
</script>