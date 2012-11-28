<script> setDatePicker(new Array('created_at'));</script>
<div id="title-level2"><?=$subtitle?></div>
<div id="form">
<div class="fields-required">Campos obligatorios (*)</div>
<form action="<?=base_url()?>facturas_lineas_controller/add_c" method="post" name="formAddfacturas_lineas" id="formAddfacturas_lineas">
	<p>
		<label><span class='required'>*</span><?=$this->config->item('concepto')?>:</label>
		<input type="text" name="concepto" id="concepto"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('costo')?>:</label>
		<input type="text" name="costo" id="costo"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('cantidad')?>:</label>
		<input type="text" name="cantidad" id="cantidad"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('subtotal')?>:</label>
		<input type="text" name="subtotal" id="subtotal"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('factura_id')?>:</label>
		<input type="text" name="factura_id" id="factura_id"></input>
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
		<input type="submit" name="guardar" value="Guardar" class="crudtest-button" id="btn-save" onClick="submitData('formAddfacturas_lineas',new Array('right-content','right-content'))"></input>
		<input type="button" name="cancelar" value="Cancelar" class="crudtest-button" id="btn-cancel" onClick="loadPage('<?=base_url()?>facturas_lineas_controller/index','right-content')"></input>
	</div>
	<div class="errors" id="errors">
	<?php
		echo validation_errors();
		if(isset($error)) echo $error;
	?>
	</div>
	<div id="busy"><img src="<?=base_url()?>css/images/ajax-loader.gif" /></div></form>
</div>
