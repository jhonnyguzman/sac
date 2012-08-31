<?php if(validation_errors() || isset($error)): ?>
	<div class="alert alert-error">
		<a class="close" data-dismiss="alert" href="#">×</a>
		<?=validation_errors()?>
		
	</div>		
<?php endif; ?>
<form action="<?=base_url()?>periodos_escuelas_controller/add_c/<?=$periodo->id?>/<?=$escuela->id?>" 
	method="post" name="formAddperiodos_escuelas" id="formAddperiodos_escuelas" class="form-horizontal">
	<div class="control-group">
		<label class="control-label" for="periodo_id"><?=$this->config->item('periodo_nombre')?>:</label>
		<div class="controls">
			<span class="input-xlarge uneditable-input">De&nbsp;<strong><?=$periodo->fecha_inicio?></strong>&nbsp;a&nbsp;<strong><?=$periodo->fecha_fin?></strong></span>
			<input type="hidden" name="periodo_id" id="periodo_id" value="<?=$periodo->id?>"></input>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="escuelas_id"><?=$this->config->item('escuelas_nombre')?>:</label>
		<div class="controls">
			<span class="input-xlarge uneditable-input"><?=$escuela->nombre?></span>
			<input type="hidden" name="escuelas_id" id="escuelas_id" value="<?=$escuela->id?>" ></input>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="matricula"><?=$this->config->item('matricula')?>:</label>
		<div class="controls">
			<input type="text" name="matricula" id="matricula"></input>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="resolucion"><?=$this->config->item('resolucion')?>:</label>
		<div class="controls">
			<input type="text" name="resolucion" id="resolucion"></input>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="cantidad_horas"><?=$this->config->item('cantidad_horas')?>:</label>
		<div class="controls">
			<input type="text" name="cantidad_horas" id="cantidad_horas"></input>
		</div>
	</div>
	
	<div class="form-actions">
			<a href="javascript:void(0)" class="btn" 
			onClick="updateContent('<?=base_url()?>periodos_escuelas_controller/show_c/<?=$escuela->id?>','contentModal')">Cancelar</a>
			<button type="submit" class="btn btn-primary" onClick="submitData('formAddperiodos_escuelas','contentModal')">Guardar</button>
	</div>
</form>
