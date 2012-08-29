<script> setDatePicker(new Array('created_at'));</script>
<div id="title-level2"><?=$subtitle?></div>
<div id="form">
<div class="fields-required">Campos obligatorios (*)</div>
<form action="<?=base_url()?>periodos_escuelas_controller/add_c" method="post" name="formAddperiodos_escuelas" id="formAddperiodos_escuelas">
	<p>
		<label><span class='required'>*</span><?=$this->config->item('periodo_id')?>:</label>
		<input type="text" name="periodo_id" id="periodo_id"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('escuelas_id')?>:</label>
		<input type="text" name="escuelas_id" id="escuelas_id"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('matricula')?>:</label>
		<input type="text" name="matricula" id="matricula"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('resolucion')?>:</label>
		<input type="text" name="resolucion" id="resolucion"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('cantidad_horas')?>:</label>
		<input type="text" name="cantidad_horas" id="cantidad_horas"></input>
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
		<input type="submit" name="guardar" value="Guardar" class="crudtest-button" id="btn-save" onClick="submitData('formAddperiodos_escuelas',new Array('right-content','right-content'))"></input>
		<input type="button" name="cancelar" value="Cancelar" class="crudtest-button" id="btn-cancel" onClick="loadPage('<?=base_url()?>periodos_escuelas_controller/index','right-content')"></input>
	</div>
	<div class="errors" id="errors">
	<?php
		echo validation_errors();
		if(isset($error)) echo $error;
	?>
	</div>
	<div id="busy"><img src="<?=base_url()?>css/images/ajax-loader.gif" /></div></form>
</div>
