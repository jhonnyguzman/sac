<?php if(validation_errors() || isset($error)): ?>
	<div class="alert alert-error">
		<a class="close" data-dismiss="alert" href="#">×</a>
		<?=validation_errors()?>
		
	</div>		
<?php endif; ?>
<form action="<?=base_url()?>docentes_perfiles_controller/add_c/<?=$perfil->id?>/<?=$docente->id?>" method="post" 
	name="formAdddocentes_perfiles" id="formAdddocentes_perfiles" class="stdform">
	<div class="control-group">
		<label class="control-label" for="docente_id"><?=$this->config->item('docente_id')?>:</label>
		<div class="controls">
			<span class="input-xlarge uneditable-input"><?=$docente->apellido." ".$docente->nombre?></span>
			<input type="hidden" name="docente_id" id="docente_id" value="<?=$docente->id?>"></input>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="perfil_id"><?=$this->config->item('perfil_id')?>:</label>
		<div class="controls">
			<span class="input-xlarge uneditable-input"><?=$perfil->nombre?></span>
			<input type="hidden" name="perfil_id" id="perfil_id" value="<?=$perfil->id?>"></input>
		</div>
	</div>

	<p class="stdformbutton">
    	<a href="javascript:void(0)" 
    	onClick="updateContent('<?=base_url()?>docentes_perfiles_controller/show_c/<?=$docente->id?>','contentModal')" class="btn" >Cancelar</a>
    	<button type="submit" class="submit radius2" onClick="submitData('formAdddocentes_perfiles','contentModal')">Asignar</button>
    </p>
</form>
