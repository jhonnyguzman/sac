<?php if(validation_errors() || isset($error)): ?>
	<div class="alert alert-error">
		<a class="close" data-dismiss="alert" href="#">×</a>
		<?=validation_errors()?>
		
	</div>		
<?php endif; ?>
<form action="<?=base_url()?>docentes_escuelas_controller/add_c/<?=$docente->id?>/<?=$escuela->id?>" method="post" 
	name="formAdddocentes_escuelas" id="formAdddocentes_escuelas" class="stdform">
	<div class="control-group">
		<label class="control-label" for="escuela_id"><?=$this->config->item('escuela_id')?>:</label>
		<div class="controls">
			<span class="input-xlarge uneditable-input"><?=$escuela->nombre?></span>
			<input type="hidden" name="escuela_id" id="escuela_id" value="<?=$escuela->id?>"></input>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="docente_id"><?=$this->config->item('docente_id')?>:</label>
		<div class="controls">
			<span class="input-xlarge uneditable-input"><?=$docente->apellido." ".$docente->nombre?></span>
			<input type="hidden" name="docente_id" id="docente_id" value="<?=$docente->id?>"></input>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="docente_id">Perfiles:</label>
		<div class="controls">
			<select name="perfiles_id[]" data-placeholder="Seleccione perfiles" class="chzn-select" multiple>
				<?php foreach($perfiles as $f): ?>
					<option value="<?=$f->id?>"><?=$f->nombre?></option>
				<?php endforeach;?>
			</select>
		</div>
	</div>
	<p class="stdformbutton">
    	<a href="javascript:void(0)" 
    	onClick="updateContent('<?=base_url()?>docentes_escuelas_controller/show_c/<?=$escuela->id?>','contentModal')" class="btn" >Cancelar</a>
    	<button type="submit" class="submit radius2" onClick="submitData('formAdddocentes_escuelas','contentModal')">Asignar</button>
    </p>
</form>		

<script type="text/javascript">
	
	$(document).ready(function() {
		// Stuff to do as soon as the DOM is ready. Use $() w/o colliding with other libs;
		$(".chzn-select").chosen();
	});
	
</script>