<script> setDatePicker(new Array('created_at'));</script>
<div id="title-level2"><?=$subtitle?></div>
<div id="form">
<div class="fields-required">Campos obligatorios (*)</div>
<form action="<?=base_url()?>fondo_comun_controller/add_c" method="post" name="formAddfondo_comun" id="formAddfondo_comun">
	<p>
		<label><span class='required'>*</span><?=$this->config->item('periodo_escuela_id')?>:</label>
		<input type="text" name="periodo_escuela_id" id="periodo_escuela_id"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('horas_sin_usar')?>:</label>
		<input type="text" name="horas_sin_usar" id="horas_sin_usar"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('horas_sin_usar_restantes')?>:</label>
		<input type="text" name="horas_sin_usar_restantes" id="horas_sin_usar_restantes"></input>
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
		<input type="submit" name="guardar" value="Guardar" class="crudtest-button" id="btn-save" onClick="submitData('formAddfondo_comun',new Array('right-content','right-content'))"></input>
		<input type="button" name="cancelar" value="Cancelar" class="crudtest-button" id="btn-cancel" onClick="loadPage('<?=base_url()?>fondo_comun_controller/index','right-content')"></input>
	</div>
	<div class="errors" id="errors">
	<?php
		echo validation_errors();
		if(isset($error)) echo $error;
	?>
	</div>
	<div id="busy"><img src="<?=base_url()?>css/images/ajax-loader.gif" /></div></form>
</div>
