<?=$this->load->view('default/_header_admin')?>

<div class="span10">
	<div class="page-header">
	  <h1><?=$title_header?></h1>
	</div>
	
	<?=$this->load->view("default/_result_messages")?>

	 <div class="row-fluid">
        <div class="span12">
	        <form class="form-inline">
	  			<h4>Seleccione una Escuela:</h4>

	  			<select name="escuela_id" id="escuela_id"  class="chzn-select"
	  				onChange="showContentTabLineaAccion('<?=base_url()?>sisperfil_controller/getMenuAsignados_c/','menusAsignados')">
	  				<?php foreach($escuelas as $f): ?>
	  					<option value="<?=$f->id?>"><?=$f->nombre?></option>
	  				<?php endforeach; ?>
	  			</select>
	  			
			</form>
			<br>
		</div>
     </div>
     <div class="row-fluid">
		<div class="span12">
			<ul class="nav nav-tabs" id="tabMenus">
			  <li class="active"><a href="#listadoLineasAcciones" data-toggle="tab" 
			  	onClick="showContentTabLineaAccion('<?=base_url()?>lineas_accion_escuelas_controller/search_c/','listadoLineasAcciones')">Lineas de Acciones</a></li>
			  <li><a href="#asignarLineaAccion" data-toggle="tab"
			  	onClick="showContentTabLineaAccion('<?=base_url()?>lineas_accion_escuelas_controller/add_c/','asignarLineaAccion')">Asignar Linea de acci&oacute;n</a></li>
			</ul>
			 
			<div class="tab-content">
			  <div class="tab-pane active" id="listadoLineasAcciones"></div>
			  <div class="tab-pane" id="asignarLineaAccion"></div>
			</div>
		</div>
     </div>

 </div><!--/span10-->


 <script>
    $(document).ready(function(){ 
        //$("#result-list").load("<?=base_url()?>horas_institucionales_controller/search_c");
        $(".chzn-select").chosen();
    });
</script>

 <?=$this->load->view('default/_footer_admin')?>
