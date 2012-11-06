<?php if(validation_errors() || isset($error)): ?>
	<div class="alert alert-error">
		<a class="close" data-dismiss="alert" href="#">×</a>
		<?=validation_errors()?>
		
	</div>		
<?php endif; ?>
<form action="<?=base_url()?>lineas_accion_docentes_controller/edit_c/<?=$lineas_accion_docentes->id?>/<?=$linea_accion_escuela_id?>" 
	method="post" name="formEditlineas_accion_docentes" id="formEditlineas_accion_docentes" class="form-inline">

	<input type="hidden" value="<?=$lineas_accion_docentes->id?>" name="id" id="id"></input>
	<input type="hidden" value="<?=$lineas_accion_docentes->linea_accion_escuela_id?>" name="linea_accion_escuela_id" id="linea_accion_escuela_id"></input>
	<input type="hidden" value="<?=$lineas_accion_docentes->fondo_comun_id?>" name="fondo_comun_id" id="fondo_comun_id"></input>
	
	<div class="control-group">
		<h5><?=$this->config->item('docente_id')?>:</h5>
		<div class="controls">
			<span class="input-xlarge uneditable-input"><?=$lineas_accion_docentes->docente_apellido." ".$lineas_accion_docentes->docente_nombre?></span>
			<input type="hidden" value="<?=$lineas_accion_docentes->docente_id?>" name="docente_id" id="docente_id"></input>
		</div>
	</div>
	<div class="control-group">
		<h5><?=$this->config->item('perfil_nombre')?>:</h5>
		<select name="perfil_id" id="perfil_id">
			<?php foreach($perfiles as $f): ?>
				<?php if($lineas_accion_docentes->perfil_id == $f->id): ?>
					<option value="<?=$f->id?>" selected><?=$f->nombre?></option>
				<?php else: ?>
					<option value="<?=$f->id?>"><?=$f->nombre?></option>
				<?php endif; ?>
			<?php endforeach; ?>
		</select>
	</div>
	<div class="control-group">
		<h5><?=$this->config->item('cantidad_horas')?>:</h5>
		<input type="text" name="cantidad_horas" id="cantidad_horas" value="<?=$lineas_accion_docentes->cantidad_horas?>"  class="input-small">
		<input type="hidden" name="cantidad_horas_old" id="cantidad_horas_old" value="<?=$lineas_accion_docentes->cantidad_horas?>" >
	</div>
	<div class="control-group">
		<h5><?=$this->config->item('created_at')?>:</h5>
		<div class="controls">
			<span class="input-xlarge uneditable-input"><?=$lineas_accion_docentes->created_at?></span>
		</div>
	</div>
	<div class="control-group">
		<h5><?=$this->config->item('updated_at')?>:</h5>
		<div class="controls">
			<span class="input-xlarge uneditable-input"><?=$lineas_accion_docentes->updated_at?></span>
		</div>
	</div>
	
	<p class="stdformbutton">
		<a href="javascript:void(0)" 
    	onClick="updateContent('<?=base_url()?>lineas_accion_docentes_controller/show_c/<?=$linea_accion_escuela_id?>','contentModal')" class="btn" >Cancelar</a>
    	<button type="submit" class="btn">Guardar</button>
    </p>

</form>

 <script>
    $(document).ready(function(){ 
        $('#formEditlineas_accion_docentes').validate({
        	submitHandler: function(form) {
			   submitDataTwo('formEditlineas_accion_docentes','contentModal');
			},
		    rules: {
		      cantidad_horas: {
		        required: true,
		        digits: true
		      }
		    },
		    highlight: function(label) {
		    	$(label).closest('.control-group').addClass('error');
		    },
		    success: function(label) {
		    	label
		    		.text('OK!').addClass('valid')
		    		.closest('.control-group').addClass('success');
		    }
	   });
    });
</script>