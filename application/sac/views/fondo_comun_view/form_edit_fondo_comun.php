<script> setDatePicker(new Array('created_at'));</script>
<div id="title-level2"><?=$subtitle?></div>
<div id="form">
<div class="fields-required">Campos obligatorios (*)</div>
<form action="<?=base_url()?>fondo_comun_controller/edit_c/<?=$fondo_comun->id?>" method="post" name="formEditfondo_comun" id="formEditfondo_comun">
	<p>
		<label><span class='required'>*</span><?=$this->config->item('id')?>:</label>
		<input type="text" value="<?=$fondo_comun->id?>" name="id" id="id"  readonly="readonly"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('periodo_escuela_id')?>:</label>
		<input type="text" value="<?=$fondo_comun->periodo_escuela_id?>" name="periodo_escuela_id" id="periodo_escuela_id"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('horas_sin_usar')?>:</label>
		<input type="text" value="<?=$fondo_comun->horas_sin_usar?>" name="horas_sin_usar" id="horas_sin_usar"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('horas_sin_usar_restantes')?>:</label>
		<input type="text" value="<?=$fondo_comun->horas_sin_usar_restantes?>" name="horas_sin_usar_restantes" id="horas_sin_usar_restantes"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('created_at')?>:</label>
		<input type="text" value="<?=$fondo_comun->created_at?>" name="created_at" id="created_at"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('updated_at')?>:</label>
		<input type="text" value="<?=$fondo_comun->updated_at?>" name="updated_at" id="updated_at"></input>
	</p>
	<div class="botonera">
		<input type="submit" name="modificar" value="Modificar" class="crudtest-button" id="btn-save" onClick="submitData('formEditfondo_comun',new Array('right-content','right-content'))"></input>
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
