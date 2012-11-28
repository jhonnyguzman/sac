<script> setDatePicker(new Array('created_at'));</script>
<div id="title-level2"><?=$subtitle?></div>
<div id="form">
<div class="fields-required">Campos obligatorios (*)</div>
<form action="<?=base_url()?>reintegros_controller/edit_c/<?=$reintegros->id?>" method="post" name="formEditreintegros" id="formEditreintegros">
	<p>
		<label><span class='required'>*</span><?=$this->config->item('id')?>:</label>
		<input type="text" value="<?=$reintegros->id?>" name="id" id="id"  readonly="readonly"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('tipo')?>:</label>
		<input type="text" value="<?=$reintegros->tipo?>" name="tipo" id="tipo"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('monto')?>:</label>
		<input type="text" value="<?=$reintegros->monto?>" name="monto" id="monto"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('persona_id')?>:</label>
		<input type="text" value="<?=$reintegros->persona_id?>" name="persona_id" id="persona_id"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('created_at')?>:</label>
		<input type="text" value="<?=$reintegros->created_at?>" name="created_at" id="created_at"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('updated_at')?>:</label>
		<input type="text" value="<?=$reintegros->updated_at?>" name="updated_at" id="updated_at"></input>
	</p>
	<div class="botonera">
		<input type="submit" name="modificar" value="Modificar" class="crudtest-button" id="btn-save" onClick="submitData('formEditreintegros',new Array('right-content','right-content'))"></input>
		<input type="button" name="cancelar" value="Cancelar" class="crudtest-button" id="btn-cancel" onClick="loadPage('<?=base_url()?>reintegros_controller/index','right-content')"></input>
	</div>
	<div class="errors" id="errors">
	<?php
		echo validation_errors();
		if(isset($error)) echo $error;
	?>
	</div>
	<div id="busy"><img src="<?=base_url()?>css/images/ajax-loader.gif" /></div></form>
</div>
