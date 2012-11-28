<script> setDatePicker(new Array('created_at'));</script>
<div id="title-level2"><?=$subtitle?></div>
<div id="form">
<div class="fields-required">Campos obligatorios (*)</div>
<form action="<?=base_url()?>proyectos_fuentes_lineas_controller/edit_c/<?=$proyectos_fuentes_lineas->id?>" method="post" name="formEditproyectos_fuentes_lineas" id="formEditproyectos_fuentes_lineas">
	<p>
		<label><span class='required'>*</span><?=$this->config->item('id')?>:</label>
		<input type="text" value="<?=$proyectos_fuentes_lineas->id?>" name="id" id="id"  readonly="readonly"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('proyecto_id')?>:</label>
		<input type="text" value="<?=$proyectos_fuentes_lineas->proyecto_id?>" name="proyecto_id" id="proyecto_id"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('fuente_linea_id')?>:</label>
		<input type="text" value="<?=$proyectos_fuentes_lineas->fuente_linea_id?>" name="fuente_linea_id" id="fuente_linea_id"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('monto_presupuestado')?>:</label>
		<input type="text" value="<?=$proyectos_fuentes_lineas->monto_presupuestado?>" name="monto_presupuestado" id="monto_presupuestado"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('created_at')?>:</label>
		<input type="text" value="<?=$proyectos_fuentes_lineas->created_at?>" name="created_at" id="created_at"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('updated_at')?>:</label>
		<input type="text" value="<?=$proyectos_fuentes_lineas->updated_at?>" name="updated_at" id="updated_at"></input>
	</p>
	<div class="botonera">
		<input type="submit" name="modificar" value="Modificar" class="crudtest-button" id="btn-save" onClick="submitData('formEditproyectos_fuentes_lineas',new Array('right-content','right-content'))"></input>
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
