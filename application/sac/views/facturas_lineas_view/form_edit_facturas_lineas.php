<script> setDatePicker(new Array('created_at'));</script>
<div id="title-level2"><?=$subtitle?></div>
<div id="form">
<div class="fields-required">Campos obligatorios (*)</div>
<form action="<?=base_url()?>facturas_lineas_controller/edit_c/<?=$facturas_lineas->id?>" method="post" name="formEditfacturas_lineas" id="formEditfacturas_lineas">
	<p>
		<label><span class='required'>*</span><?=$this->config->item('id')?>:</label>
		<input type="text" value="<?=$facturas_lineas->id?>" name="id" id="id"  readonly="readonly"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('concepto')?>:</label>
		<input type="text" value="<?=$facturas_lineas->concepto?>" name="concepto" id="concepto"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('costo')?>:</label>
		<input type="text" value="<?=$facturas_lineas->costo?>" name="costo" id="costo"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('cantidad')?>:</label>
		<input type="text" value="<?=$facturas_lineas->cantidad?>" name="cantidad" id="cantidad"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('subtotal')?>:</label>
		<input type="text" value="<?=$facturas_lineas->subtotal?>" name="subtotal" id="subtotal"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('factura_id')?>:</label>
		<input type="text" value="<?=$facturas_lineas->factura_id?>" name="factura_id" id="factura_id"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('created_at')?>:</label>
		<input type="text" value="<?=$facturas_lineas->created_at?>" name="created_at" id="created_at"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('updated_at')?>:</label>
		<input type="text" value="<?=$facturas_lineas->updated_at?>" name="updated_at" id="updated_at"></input>
	</p>
	<div class="botonera">
		<input type="submit" name="modificar" value="Modificar" class="crudtest-button" id="btn-save" onClick="submitData('formEditfacturas_lineas',new Array('right-content','right-content'))"></input>
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
