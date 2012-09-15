
<?php if(validation_errors() || isset($error)): ?>
	<div class="alert alert-error">
		<a class="close" data-dismiss="alert" href="#">×</a>
		<?=validation_errors()?>
		
	</div>		
<?php endif; ?>
<form action="<?=base_url()?>lineas_accion_escuelas_controller/add_c" method="post" 
	name="formAddlineas_accion_escuelas" id="formAddlineas_accion_escuelas" class="form-inline">
	<div class="control-group">
		<h5><?=$this->config->item('periodo_escuela_id')?>:</h5>
		<div class="controls">
			<span class="input-xlarge uneditable-input">De&nbsp;<strong><?=$periodo_escuela[0]->periodo_fecha_inicio?></strong>&nbsp;a&nbsp;<strong><?=$periodo_escuela[0]->periodo_fecha_fin?></strong></span>
			<input type="hidden" name="periodo_escuela_id" id="periodo_escuela_id"  value="<?=$periodo_escuela[0]->id?>"></input>
		</div>
	</div>
	<div class="control-group">
		<h5><?=$this->config->item('linea_accion_id')?>:</h5>
		<div class="controls">
			<select name="linea_accion_id" class="chzn-select">
				<?php foreach($lineas_accion as $f): ?>
					<option value="<?=$f->id?>"><?=$f->nombre?></option>
				<?php endforeach; ?>
			</select>
		</div>
	</div>
	
	<p class="stdformbutton">
    	<button type="submit" class="btn">Guardar</button>
    </div>

</form>

<br>
