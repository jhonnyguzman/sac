<script> setDatePicker(new Array('created_at'));</script>
<div id="title-level2"><?=$subtitle?></div>
<div id="form">
<div class="fields-required">Campos obligatorios (*)</div>
<form action="<?=base_url()?>fuentes_lineas_controller/edit_c/<?=$fuentes_lineas->id?>" method="post" name="formEditfuentes_lineas" id="formEditfuentes_lineas">
	<p>
		<label><span class='required'>*</span><?=$this->config->item('id')?>:</label>
		<input type="text" value="<?=$fuentes_lineas->id?>" name="id" id="id"  readonly="readonly"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('fuente_id')?>:</label>
		<input type="text" value="<?=$fuentes_lineas->fuente_id?>" name="fuente_id" id="fuente_id"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('anio')?>:</label>
		<input type="text" value="<?=$fuentes_lineas->anio?>" name="anio" id="anio"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('monto_global')?>:</label>
		<input type="text" value="<?=$fuentes_lineas->monto_global?>" name="monto_global" id="monto_global"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('monto_especial')?>:</label>
		<input type="text" value="<?=$fuentes_lineas->monto_especial?>" name="monto_especial" id="monto_especial"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('estado')?>:</label>
		<input type="text" value="<?=$fuentes_lineas->estado?>" name="estado" id="estado"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('created_at')?>:</label>
		<input type="text" value="<?=$fuentes_lineas->created_at?>" name="created_at" id="created_at"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('updated_at')?>:</label>
		<input type="text" value="<?=$fuentes_lineas->updated_at?>" name="updated_at" id="updated_at"></input>
	</p>
	<div class="botonera">
		<input type="submit" name="modificar" value="Modificar" class="crudtest-button" id="btn-save" onClick="submitData('formEditfuentes_lineas',new Array('right-content','right-content'))"></input>
		<input type="button" name="cancelar" value="Cancelar" class="crudtest-button" id="btn-cancel" onClick="loadPage('<?=base_url()?>fuentes_lineas_controller/index','right-content')"></input>
	</div>
	<div class="errors" id="errors">
	<?php
		echo validation_errors();
		if(isset($error)) echo $error;
	?>
	</div>
	<div id="busy"><img src="<?=base_url()?>css/images/ajax-loader.gif" /></div></form>
</div>
