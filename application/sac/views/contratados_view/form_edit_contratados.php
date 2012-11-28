<script> setDatePicker(new Array('fecha_inicio','fecha_fin','created_at'));</script>
<div id="title-level2"><?=$subtitle?></div>
<div id="form">
<div class="fields-required">Campos obligatorios (*)</div>
<form action="<?=base_url()?>contratados_controller/edit_c/<?=$contratados->id?>" method="post" name="formEditcontratados" id="formEditcontratados">
	<p>
		<label><span class='required'>*</span><?=$this->config->item('id')?>:</label>
		<input type="text" value="<?=$contratados->id?>" name="id" id="id"  readonly="readonly"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('proyecto_persona_id')?>:</label>
		<input type="text" value="<?=$contratados->proyecto_persona_id?>" name="proyecto_persona_id" id="proyecto_persona_id"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('fecha_inicio')?>:</label>
		<input type="text" value="<?=$contratados->fecha_inicio?>" name="fecha_inicio" id="fecha_inicio"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('fecha_fin')?>:</label>
		<input type="text" value="<?=$contratados->fecha_fin?>" name="fecha_fin" id="fecha_fin"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('monto_total')?>:</label>
		<input type="text" value="<?=$contratados->monto_total?>" name="monto_total" id="monto_total"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('cantidad_horas')?>:</label>
		<input type="text" value="<?=$contratados->cantidad_horas?>" name="cantidad_horas" id="cantidad_horas"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('funcion')?>:</label>
		<input type="text" value="<?=$contratados->funcion?>" name="funcion" id="funcion"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('habilitado')?>:</label>
		<input type="text" value="<?=$contratados->habilitado?>" name="habilitado" id="habilitado"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('created_at')?>:</label>
		<input type="text" value="<?=$contratados->created_at?>" name="created_at" id="created_at"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('updated_at')?>:</label>
		<input type="text" value="<?=$contratados->updated_at?>" name="updated_at" id="updated_at"></input>
	</p>
	<div class="botonera">
		<input type="submit" name="modificar" value="Modificar" class="crudtest-button" id="btn-save" onClick="submitData('formEditcontratados',new Array('right-content','right-content'))"></input>
		<input type="button" name="cancelar" value="Cancelar" class="crudtest-button" id="btn-cancel" onClick="loadPage('<?=base_url()?>contratados_controller/index','right-content')"></input>
	</div>
	<div class="errors" id="errors">
	<?php
		echo validation_errors();
		if(isset($error)) echo $error;
	?>
	</div>
	<div id="busy"><img src="<?=base_url()?>css/images/ajax-loader.gif" /></div></form>
</div>
