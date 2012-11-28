<?php if(validation_errors() || isset($error)): ?>
	<div class="alert alert-error">
		<a class="close" data-dismiss="alert" href="#">×</a>
		<?=validation_errors()?>
		
	</div>		
<?php endif; ?>
<form action="<?=base_url()?>fuentes_rubros_controller/add_c/<?=$fuente_id?>" method="post" name="formAddfuentes_rubros" id="formAddfuentes_rubros">
	
	<input type="hidden" name="fuente_id" id="fuente_id" value="<?=$fuente_id?>"></input>

	<div class="control-group">
		<label class="control-label" for="rubro_id"><?=$this->config->item('rubro_id')?>:</label>
		<div class="controls">
			<select name="rubro_id" id="rubro_id">
				<?php foreach($rubros as $f): ?>
					<option value="<?=$f->id?>"><?=$f->nombre?></option>
				<?php endforeach; ?>
			</select>
		</div>
	</div>
		

	<a href="#" class="btn" onClick="updateContent('<?=base_url()?>fuentes_rubros_controller/show_c/<?=$fuente_id?>','contentModal')">Cancelar</a>
	<button type="submit" class="btn btn-primary" onClick="submitData('formAddfuentes_rubros','contentModal')" >Guardar</button>

</form>