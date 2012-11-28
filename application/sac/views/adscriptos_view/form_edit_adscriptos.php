<script> setDatePicker(new Array('created_at'));</script>
<div id="title-level2"><?=$subtitle?></div>
<div id="form">
<div class="fields-required">Campos obligatorios (*)</div>
<form action="<?=base_url()?>adscriptos_controller/edit_c/<?=$adscriptos->id?>" method="post" name="formEditadscriptos" id="formEditadscriptos">
	<p>
		<label><span class='required'>*</span><?=$this->config->item('id')?>:</label>
		<input type="text" value="<?=$adscriptos->id?>" name="id" id="id"  readonly="readonly"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('proyecto_persona_id')?>:</label>
		<input type="text" value="<?=$adscriptos->proyecto_persona_id?>" name="proyecto_persona_id" id="proyecto_persona_id"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('escuela_id')?>:</label>
		<input type="text" value="<?=$adscriptos->escuela_id?>" name="escuela_id" id="escuela_id"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('cantidad_horas')?>:</label>
		<input type="text" value="<?=$adscriptos->cantidad_horas?>" name="cantidad_horas" id="cantidad_horas"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('habilitado')?>:</label>
		<input type="text" value="<?=$adscriptos->habilitado?>" name="habilitado" id="habilitado"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('created_at')?>:</label>
		<input type="text" value="<?=$adscriptos->created_at?>" name="created_at" id="created_at"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('updated_at')?>:</label>
		<input type="text" value="<?=$adscriptos->updated_at?>" name="updated_at" id="updated_at"></input>
	</p>
	<div class="botonera">
		<input type="submit" name="modificar" value="Modificar" class="crudtest-button" id="btn-save" onClick="submitData('formEditadscriptos',new Array('right-content','right-content'))"></input>
		<input type="button" name="cancelar" value="Cancelar" class="crudtest-button" id="btn-cancel" onClick="loadPage('<?=base_url()?>adscriptos_controller/index','right-content')"></input>
	</div>
	<div class="errors" id="errors">
	<?php
		echo validation_errors();
		if(isset($error)) echo $error;
	?>
	</div>
	<div id="busy"><img src="<?=base_url()?>css/images/ajax-loader.gif" /></div></form>
</div>
