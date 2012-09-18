<?php if(validation_errors() || isset($error)): ?>
	<div class="alert alert-error">
		<a class="close" data-dismiss="alert" href="#">×</a>
		<?=validation_errors()?>
		
	</div>		
<?php endif; ?>
<form action="<?=base_url()?>lineas_accion_docentes_controller/add_c/<?=$linea_accion_escuela_id?>" method="post" 
	name="formAddlineas_accion_docentes" id="formAddlineas_accion_docentes" class="form-inline">
	
	<input type="hidden" name="linea_accion_escuela_id" value="<?=$linea_accion_escuela_id?>">

	<div class="control-group">
		<h5>Docente:</h5>
		<select name="docente_id" id="docente_id" >
			<?php foreach($docentes as $f): ?>
				<option value="<?=$f->id?>"><?=$f->apellido." ".$f->nombre?></option>
			<?php endforeach; ?>
		</select>
	</div>
	<div class="control-group">
		<h5>Perfil:</h5>
		<select name="perfil_id" id="perfil_id">
			<?php foreach($perfiles as $f): ?>
				<option value="<?=$f->id?>"><?=$f->nombre?></option>
			<?php endforeach; ?>
		</select>
	</div>
	<div class="control-group">
		<h5>Horas:</h5>
		<input type="text" name="cantidad_horas" id="cantidad_horas" class="input-small">
	</div>

	<p class="stdformbutton">
		<a href="javascript:void(0)" 
    	onClick="updateContent('<?=base_url()?>lineas_accion_docentes_controller/show_c/<?=$linea_accion_escuela_id?>','contentModal')" class="btn" >Cancelar</a>
    	<button type="submit" class="btn"  onClick="submitData('formAddlineas_accion_docentes','contentModal')">Guardar</button>
    </p>

</form>

 <script>
    $(document).ready(function(){ 
        
    });
</script>