 <?=$this->load->view("default/_result_messages_modal")?>
<ul class="nav nav-tabs">
  <li class="active"><a href="#perfilesAsignados" data-toggle="tab">Perfiles asignados</a></li>
  <li><a href="#perfilesSinAsignar" data-toggle="tab">Perfiles sin asignar</a></li>
</ul>

<div class="tab-content">
  <div class="tab-pane active" id="perfilesAsignados"><?=$this->load->view('docentes_perfiles_view/list_perfiles_asignados')?></div>
  <div class="tab-pane" id="perfilesSinAsignar"><?=$this->load->view('docentes_perfiles_view/list_perfiles_sin_asignar')?></div>
</div>