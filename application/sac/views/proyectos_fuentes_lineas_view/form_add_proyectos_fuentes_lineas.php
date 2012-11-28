<script> setDatePicker(new Array('created_at'));</script>
<div id="title-level2"><?=$subtitle?></div>
<div id="form">
<div class="fields-required">Campos obligatorios (*)</div>
<form action="<?=base_url()?>proyectos_fuentes_lineas_controller/add_c" method="post" name="formAddproyectos_fuentes_lineas" id="formAddproyectos_fuentes_lineas">
	<p>
		<label><span class='required'>*</span><?=$this->config->item('proyecto_id')?>:</label>
		<input type="text" name="proyecto_id" id="proyecto_id"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('fuente_linea_id')?>:</label>
		<input type="text" name="fuente_linea_id" id="fuente_linea_id"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('monto_presupuestado')?>:</label>
		<input type="text" name="monto_presupuestado" id="monto_presupuestado"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('created_at')?>:</label>
		<input type="text" name="created_at" id="created_at"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('updated_at')?>:</label>
		<input type="text" name="updated_at" id="updated_at"></input>
	</p>
	<div class="botonera">
		<input type="submit" name="guardar" value="Guardar" class="crudtest-button" id="btn-save" onClick="submitData('formAddproyectos_fuentes_lineas',new Array('right-content','right-content'))"></input>
		<input type="button" name="cancelar" value="Cancelar" class="crudtest-button" id="btn-cancel" onClick="loadPage('<?=base_url()?>proyectos_fuentes_lineas_controller/index','right-content')"></input>
	</div>
	<div class="errors" id="errors">
	<?php
		echo validation_errors();
		if(isset($error)) echo $error;
	?>
	</div>
	<div id="busy"><img src="<?=base_url()?>css/images/ajax-loader.gif" /></div></form>
</div>
