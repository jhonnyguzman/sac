<?php if(validation_errors() || isset($error)): ?>
	<div class="alert alert-error">
		<a class="close" data-dismiss="alert" href="#">×</a>
		<?=validation_errors()?>
		
	</div>		
<?php endif; ?>
<form action="<?=base_url()?>lineas_accion_docentes_controller/add_c" method="post" 
	name="formAddlineas_accion_docentes" id="formAddlineas_accion_docentes" class="form-inline">
	<div class="control-group">
		<h5><?=$this->config->item('linea_accion_escuela_id')?>:</h5>
		<div class="controls">
			<select name="linea_accion_escuela_id" class="chzn-select">
				<?php foreach($lineas_accion as $f): ?>
					<option value="<?=$f->id?>"><?=$f->nombre?></option>
				<?php endforeach; ?>
			</select>
		</div>
	</div>
	<div class="control-group">
		<h5><?=$this->config->item('docente_perfil_escuela_id')?>:</h5>
		<div class="controls">
			<span class="help-inline">Docente:</span>
			<select name="docentes_ecuelas" class="chzn-select">
				<?php foreach($docentes_escuelas as $f): ?>
					<option value="<?=$f->docente_id?>"><?=$f->docente_apellido." ".$f->docente_nombre?></option>
				<?php endforeach; ?>
			</select>
			<span class="help-inline">Mes:</span>
			<select name="linea_periodo_escuela_id" class="chzn-select">
				<?php foreach($lineas_periodos_escuelas as $f): ?>
					<option value="<?=$f->id?>"><?=$f->mes_descripcion." ".$f->anio?></option>
				<?php endforeach; ?>
			</select>
			<span class="help-inline">Horas:</span>
			<input type="text" name="docente_perfil_escuela_id" id="docente_perfil_escuela_id" class="input-small">
			 <button type="submit" class="btn">Agregar</button>
		</div>
	</div>

	<p class="stdformbutton">
    	<a href="<?=base_url()?>lineas_accion_docentes_controller/index" class="btn" >Cancelar</a>
    	<button type="submit" class="btn">Guardar</button>
    </p>

</form>

 <script>
    $(document).ready(function(){ 
        $(".chzn-select").chosen();
    });
</script>