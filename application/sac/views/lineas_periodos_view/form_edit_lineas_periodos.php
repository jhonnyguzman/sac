<script> setDatePicker(new Array('created_at'));</script>
<div id="title-level2"><?=$subtitle?></div>
<div id="form">
<div class="fields-required">Campos obligatorios (*)</div>
<form action="<?=base_url()?>lineas_periodos_controller/edit_c/<?=$lineas_periodos->id?>" method="post" name="formEditlineas_periodos" id="formEditlineas_periodos">
	<p>
		<label><span class='required'>*</span><?=$this->config->item('id')?>:</label>
		<input type="text" value="<?=$lineas_periodos->id?>" name="id" id="id"  readonly="readonly"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('periodo_id')?>:</label>
		<input type="text" value="<?=$lineas_periodos->periodo_id?>" name="periodo_id" id="periodo_id"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('mes')?>:</label>
		<input type="text" value="<?=$lineas_periodos->mes?>" name="mes" id="mes"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('anio')?>:</label>
		<input type="text" value="<?=$lineas_periodos->anio?>" name="anio" id="anio"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('created_at')?>:</label>
		<input type="text" value="<?=$lineas_periodos->created_at?>" name="created_at" id="created_at"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('updated_at')?>:</label>
		<input type="text" value="<?=$lineas_periodos->updated_at?>" name="updated_at" id="updated_at"></input>
	</p>
	<div class="botonera">
		<input type="submit" name="modificar" value="Modificar" class="crudtest-button" id="btn-save" onClick="submitData('formEditlineas_periodos',new Array('right-content','right-content'))"></input>
		<input type="button" name="cancelar" value="Cancelar" class="crudtest-button" id="btn-cancel" onClick="loadPage('<?=base_url()?>lineas_periodos_controller/index','right-content')"></input>
	</div>
	<div class="errors" id="errors">
	<?php
		echo validation_errors();
		if(isset($error)) echo $error;
	?>
	</div>
	<div id="busy"><img src="<?=base_url()?>css/images/ajax-loader.gif" /></div></form>
</div>
