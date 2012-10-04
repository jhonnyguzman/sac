<?php if(validation_errors() || isset($error)): ?>
	<div class="alert alert-error">
		<a class="close" data-dismiss="alert" href="#">×</a>
		<?=validation_errors()?>
		
	</div>		
<?php endif; ?>
<form action="<?=base_url()?>docentes_perfiles_controller/edit_c/<?=$docentes_perfiles->id?>" 
	method="post" name="formEditdocentes_perfiles" id="formEditdocentes_perfiles" class="form-horizontal">
	
	<input type="hidden" value="<?=$docentes_perfiles->id?>" name="id" id="id"/>
	
	<div class="control-group">
		<label class="control-label" for="docente_perfil_id"><?=$this->config->item('docente_id')?>:</label>
		<div class="controls">
			<input type="text" value="<?=$docentes_perfiles->docente_id?>" name="docente_id" id="docente_id"></input>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="docente_perfil_id"><?=$this->config->item('perfil_id')?>:</label>
		<div class="controls">
			<input type="text" value="<?=$docentes_perfiles->perfil_id?>" name="perfil_id" id="perfil_id"></input>
		</div>
	</div>

	<div class="form-actions">
    	<a href="javascript:void(0)" 
    	onClick="updateContent('<?=base_url()?>docentes_perfiles_controller/show_c/<?=$docentes_perfiles->docente_id?>','contentModal')" class="btn" >Cancelar</a>
    	<button type="submit" class="submit radius2" onClick="submitData('formEditdocentes_perfiles','contentModal')">Modificar</button>
    </p>
</form>


