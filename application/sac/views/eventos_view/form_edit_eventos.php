<?php if(validation_errors() || isset($error)): ?>
	<div class="alert alert-error">
		<a class="close" data-dismiss="alert" href="#">×</a>
		<?=validation_errors()?>
		
	</div>		
<?php endif; ?>
<form action="<?=base_url()?>eventos_controller/edit_c/<?=$eventos->id?>/<?=$proyecto_id?>" 
	method="post" name="formEditeventos" id="formEditeventos"  class="form-horizontal">
	
	<input type="hidden" value="<?=$eventos->id?>" name="id" id="id"  readonly="readonly"></input>
	<input type="hidden" value="<?=$eventos->proyecto_id?>" name="proyecto_id" id="proyecto_id"></input>
	
	<div class="control-group">
		<label class="control-label" for="nombre"><?=$this->config->item('nombre')?>:</label>
		<div class="controls">
			<input type="text" value="<?=$eventos->nombre?>" name="nombre" id="nombre"></input>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="descripcion"><?=$this->config->item('descripcion')?>:</label>
		<div class="controls">
			<input type="text" value="<?=$eventos->descripcion?>" name="descripcion" id="descripcion"></input>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="fecha"><?=$this->config->item('fecha')?>:</label>
		<div class="controls">
			<input type="text" value="<?=$eventos->fecha?>" name="fecha" id="fecha"></input>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="lugar"><?=$this->config->item('lugar')?>:</label>
		<div class="controls">
			<input type="text" value="<?=$eventos->lugar?>" name="lugar" id="lugar"></input>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="cantidad_asistentes"><?=$this->config->item('cantidad_asistentes')?>:</label>
		<div class="controls">
			<input type="text" value="<?=$eventos->cantidad_asistentes?>" name="cantidad_asistentes" id="cantidad_asistentes"></input>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="monto_total"><?=$this->config->item('monto_total')?>:</label>
		<div class="controls">
			<input type="text" value="<?=$eventos->monto_total?>" name="monto_total" id="monto_total"></input>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="created_at"><?=$this->config->item('created_at')?>:</label>
		<div class="controls">
			<input type="text" value="<?=$eventos->created_at?>" name="created_at" id="created_at"  readonly="readonly"></input>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="updated_at"><?=$this->config->item('updated_at')?>:</label>
		<div class="controls">
			<input type="text" value="<?=$eventos->updated_at?>" name="updated_at" id="updated_at"  readonly="readonly"></input>
		</div>
	</div>

	<div class="form-actions">
    	<a href="#" class="btn" onClick="updateContent('<?=base_url()?>eventos_controller/show_c/<?=$proyecto_id?>','contentModal')">Cancelar</a>
    	<button type="submit" class="btn btn-primary" onClick="submitData('formEditeventos','contentModal')" >Guardar</button>
	</div>
</form>