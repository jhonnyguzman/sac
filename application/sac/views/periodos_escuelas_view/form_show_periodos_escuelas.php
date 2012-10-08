 <?=$this->load->view("default/_result_messages_modal")?>
<ul class="nav nav-tabs">
  <li class="active"><a href="#periodos" data-toggle="tab">Periodo Activo</a></li>
  <li><a href="#asign" data-toggle="tab">Asignar Periodos</a></li>
  <li><a href="#historico" data-toggle="tab">Historicos</a></li>
</ul>

<div class="tab-content">
  <div class="tab-pane active" id="periodos"><?=$this->load->view('periodos_escuelas_view/list_periodos_activo')?></div>
  <div class="tab-pane" id="asign"><?=$this->load->view('periodos_escuelas_view/list_periodos_to_asign')?></div>
  <div class="tab-pane" id="historico"><?=$this->load->view('periodos_escuelas_view/list_periodos_historicos')?></div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$("#contentModalFooter").find(".btnBack").remove();
	});
</script>