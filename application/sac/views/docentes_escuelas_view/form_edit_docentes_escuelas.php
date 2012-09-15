<?php if(validation_errors() || isset($error)): ?>
	<div class="alert alert-error">
		<a class="close" data-dismiss="alert" href="#">×</a>
		<?=validation_errors()?>
		
	</div>		
<?php endif; ?>
<form action="<?=base_url()?>docentes_escuelas_controller/edit_c/<?=$docentes_escuelas->id?>" 
	method="post" name="formEditdocentes_escuelas" id="formEditdocentes_escuelas" class="stdform">
	
	<input type="hidden" value="<?=$docentes_escuelas->id?>" name="id" id="id"/>
	
	<div class="control-group">
		<label class="control-label" for="escuela_id"><?=$this->config->item('escuela_id')?>:</label>
		<div class="controls">
			<span class="input-xlarge uneditable-input"><?=$docentes_escuelas->escuela_nombre?></span>
			<input type="hidden" value="<?=$docentes_escuelas->escuela_id?>" name="escuela_id" id="escuela_id"></input>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label" for="docente_id"><?=$this->config->item('docente_id')?>:</label>
		<div class="controls">
			<span class="input-xlarge uneditable-input"><?=$docentes_escuelas->docente_apellido." ".$docentes_escuelas->docente_nombre?></span>
			<input type="hidden" value="<?=$docentes_escuelas->docente_id?>" name="docente_id" id="docente_id"></input>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label" for="docente_id">Perfiles:</label>
		<div class="controls">
			<select name="perfiles_id[]" id="perfiles_id" data-placeholder="Seleccione perfiles" class="chzn-select" multiple>
					<?php foreach($docentes_perfiles_escuelas as $g): ?>
						<option value="<?=$g->perfil_id?>" selected><?=$g->perfil_nombre?></option>
					<?php endforeach;?>
					<?php foreach($perfiles as $f): ?>
						<option value="<?=$f->id?>" ><?=$f->nombre?></option>	
					<?php endforeach;?>
			</select>
		</div>
	</div>
	
	<p class="stdformbutton">
    	<a href="javascript:void(0)" 
    	onClick="updateContent('<?=base_url()?>docentes_escuelas_controller/show_c/<?=$docentes_escuelas->escuela_id?>','contentModal')" class="btn" >Cancelar</a>
    	<button type="submit" class="submit radius2" onClick="submitData('formEditdocentes_escuelas','contentModal')">Modificar</button>
    </p>
</form>		

<script type="text/javascript">
	
	$(document).ready(function() {
		// Stuff to do as soon as the DOM is ready. Use $() w/o colliding with other libs;
		$(".chzn-select").chosen();
	});
	
</script>

