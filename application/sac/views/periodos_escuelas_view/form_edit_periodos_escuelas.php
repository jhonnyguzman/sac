<?php if(validation_errors() || isset($error)): ?>
	<div class="alert alert-error">
		<a class="close" data-dismiss="alert" href="#">×</a>
		<?=validation_errors()?>
		
	</div>		
<?php endif; ?>
<form action="<?=base_url()?>periodos_escuelas_controller/edit_c/<?=$periodos_escuelas->id?>" 
	method="post" name="formEditperiodos_escuelas" id="formEditperiodos_escuelas" class="form-horizontal">
	<div class="control-group">
		<label class="control-label" for="id"><?=$this->config->item('id')?>:</label>
		<div class="controls">
			<input type="text" value="<?=$periodos_escuelas->id?>" name="id" id="id"  readonly="readonly"></input>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="periodo_id"><?=$this->config->item('periodo_nombre')?>:</label>
		<div class="controls">
			<span class="input-xlarge uneditable-input">De&nbsp;<strong><?=$periodos_escuelas->periodo_fecha_inicio?></strong>&nbsp;a&nbsp;<strong><?=$periodos_escuelas->periodo_fecha_fin?></strong></span>
			<input type="hidden" value="<?=$periodos_escuelas->periodo_id?>" name="periodo_id" id="periodo_id"></input>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="escuelas_id"><?=$this->config->item('escuelas_nombre')?>:</label>
		<div class="controls">
			<span class="input-xlarge uneditable-input"><?=$periodos_escuelas->escuela_nombre?></span>
			<input type="hidden" value="<?=$periodos_escuelas->escuelas_id?>" name="escuelas_id" id="escuelas_id"></input>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="matricula"><?=$this->config->item('matricula')?>:</label>
		<div class="controls">
			<input type="text" value="<?=$periodos_escuelas->matricula?>" name="matricula" id="matricula"></input>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="resolucion"><?=$this->config->item('resolucion')?>:</label>
		<div class="controls">
			<input type="text" value="<?=$periodos_escuelas->resolucion?>" name="resolucion" id="resolucion"></input>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="cantidad_horas"><?=$this->config->item('cantidad_horas')?>:</label>
		<div class="controls">
			<input type="text" value="<?=$periodos_escuelas->cantidad_horas?>" name="cantidad_horas" id="cantidad_horas"></input>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="created_at"><?=$this->config->item('created_at')?>:</label>
		<div class="controls">
			<input type="text" value="<?=$periodos_escuelas->created_at?>" name="created_at" id="created_at" readonly="true"></input>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="updated_at"><?=$this->config->item('updated_at')?>:</label>
		<div class="controls">
			<input type="text" value="<?=$periodos_escuelas->updated_at?>" name="updated_at" id="updated_at" readonly="true"></input>
		</div>
	</div>
	
	<div class="form-actions">
			<a href="javascript:void(0)" class="btn" 
			onClick="updateContent('<?=base_url()?>periodos_escuelas_controller/show_c/<?=$periodos_escuelas->escuelas_id?>','contentModal')">Cancelar</a>
			<button type="submit" class="btn btn-primary" onClick="submitData('formEditperiodos_escuelas','contentModal')">Guardar</button>
	</div>

</form>

