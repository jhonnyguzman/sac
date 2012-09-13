 <?=$this->load->view("default/_result_messages_modal")?>
<ul class="nav nav-tabs">
  <li class="active"><a href="#docentesAsignados" data-toggle="tab">Docentes asignados</a></li>
  <li><a href="#docentesSinAsignar" data-toggle="tab">Docentes sin asignar</a></li>
</ul>

<div class="tab-content">
  <div class="tab-pane active" id="docentesAsignados"><?=$this->load->view('docentes_escuelas_view/list_docentes_asignados')?></div>
  <div class="tab-pane" id="docentesSinAsignar"><?=$this->load->view('docentes_escuelas_view/list_docentes_sin_asignar')?></div>
</div>