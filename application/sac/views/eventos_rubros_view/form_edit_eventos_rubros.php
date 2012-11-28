<script> setDatePicker(new Array('created_at'));</script>
<div id="title-level2"><?=$subtitle?></div>
<div id="form">
<div class="fields-required">Campos obligatorios (*)</div>
<form action="<?=base_url()?>eventos_rubros_controller/edit_c/<?=$eventos_rubros->id?>" method="post" name="formEditeventos_rubros" id="formEditeventos_rubros">
	<p>
		<label><span class='required'>*</span><?=$this->config->item('id')?>:</label>
		<input type="text" value="<?=$eventos_rubros->id?>" name="id" id="id"  readonly="readonly"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('evento_id')?>:</label>
		<input type="text" value="<?=$eventos_rubros->evento_id?>" name="evento_id" id="evento_id"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('rubro_id')?>:</label>
		<input type="text" value="<?=$eventos_rubros->rubro_id?>" name="rubro_id" id="rubro_id"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('created_at')?>:</label>
		<input type="text" value="<?=$eventos_rubros->created_at?>" name="created_at" id="created_at"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('updated_at')?>:</label>
		<input type="text" value="<?=$eventos_rubros->updated_at?>" name="updated_at" id="updated_at"></input>
	</p>
	<div class="botonera">
		<input type="submit" name="modificar" value="Modificar" class="crudtest-button" id="btn-save" onClick="submitData('formEditeventos_rubros',new Array('right-content','right-content'))"></input>
		<input type="button" name="cancelar" value="Cancelar" class="crudtest-button" id="btn-cancel" onClick="loadPage('<?=base_url()?>eventos_rubros_controller/index','right-content')"></input>
	</div>
	<div class="errors" id="errors">
	<?php
		echo validation_errors();
		if(isset($error)) echo $error;
	?>
	</div>
	<div id="busy"><img src="<?=base_url()?>css/images/ajax-loader.gif" /></div></form>
</div>
