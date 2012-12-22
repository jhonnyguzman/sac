<?php if(validation_errors() || isset($error)): ?>
	<div class="alert alert-error">
		<a class="close" data-dismiss="alert" href="#">×</a>
		<?=validation_errors()?>
		
	</div>		
<?php endif; ?>
<form action="<?=base_url()?>eventos_controller/add_c/<?=$proyecto_id?>" method="post" name="formAddeventos" id="formAddeventos" class="form-horizontal">

	<input type="hidden" name="proyecto_id" id="proyecto_id" value="<?=$proyecto_id?>"></input>

	<div class="control-group">
		<label class="control-label" for="nombre"><?=$this->config->item('nombre')?>:</label>
		<div class="controls">
			<input type="text" name="nombre" id="nombre"></input>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="descripcion"><?=$this->config->item('descripcion')?>:</label>
		<div class="controls">
			<input type="text" name="descripcion" id="descripcion"></input>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="fecha"><?=$this->config->item('fecha')?>:</label>
		<div class="controls">
			<input type="text" name="fecha" id="fecha"></input>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="lugar"><?=$this->config->item('lugar')?>:</label>
		<div class="controls">
			<input type="text" name="lugar" id="lugar"></input>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="cantidad_asistentes"><?=$this->config->item('cantidad_asistentes')?>:</label>
		<div class="controls">
			<input type="text" name="cantidad_asistentes" id="cantidad_asistentes"></input>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="monto_presupuestado"><?=$this->config->item('monto_presupuestado')?>:</label>
		<div class="controls">
			<input type="text" name="monto_presupuestado" id="monto_presupuestado"></input>
		</div>
	</div>
		
	<div class="form-actions">
    	<a href="#" class="btn" onClick="updateContent('<?=base_url()?>eventos_controller/show_c/<?=$proyecto_id?>','contentModal')">Cancelar</a>
    	<button type="submit" class="btn btn-primary" onClick="submitData('formAddeventos','contentModal')" >Guardar</button>
	</div>
</form>
