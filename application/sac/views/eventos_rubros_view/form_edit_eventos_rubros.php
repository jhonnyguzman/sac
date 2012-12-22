<?php if(validation_errors() || isset($error)): ?>
	<div class="alert alert-error">
		<a class="close" data-dismiss="alert" href="#">×</a>
		<?=validation_errors()?>
		
	</div>		
<?php endif; ?>
<form action="<?=base_url()?>eventos_rubros_controller/edit_c/<?=$eventos_rubros->id?>/<?=$evento_id?>/<?=$proyecto_id?>" 
	method="post" name="formEditeventos_rubros" id="formEditeventos_rubros">
			
	<input type="hidden" value="<?=$eventos_rubros->id?>" name="id" id="id" ></input>
	<input type="hidden" value="<?=$eventos_rubros->evento_id?>" name="evento_id" id="evento_id"></input>
	
	<div class="control-group">
		<label class="control-label" for="rubro_nombre"><?=$this->config->item('rubro_nombre')?>:</label>
		<div class="controls">
			<input type="text" value="<?=$eventos_rubros->rubro_nombre?>" name="rubro_nombre" id="rubro_nombre" readonly></input>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="fuente_rubro_id">Fuente de financiamiento:</label>
		<div class="controls">
			<select name="fuente_rubro_id" id="fuente_rubro_id">
				<?php foreach($fuentes_rubro as $f): ?>
					<?php if($f->id == $eventos_rubros->fuente_rubro_id): ?>
						<option value="<?=$f->id?>" selected><?=$f->fuente_nombre?></option>
					<?php else: ?>
						<option value="<?=$f->id?>"><?=$f->fuente_nombre?></option>
					<?php endif; ?>
				<?php endforeach; ?>
			</select>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="costo"><?=$this->config->item('costo')?>:</label>
		<div class="controls">
			<input type="text" name="costo" id="costo" value="<?=$eventos_rubros->costo?>" />		
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="created_at"><?=$this->config->item('created_at')?>:</label>
		<div class="controls">
			<input type="text" value="<?=$eventos_rubros->created_at?>" name="created_at" id="created_at" readonly></input>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="updated_at"><?=$this->config->item('updated_at')?>:</label>
		<div class="controls">
			<input type="text" value="<?=$eventos_rubros->updated_at?>" name="updated_at" id="updated_at" readonly></input>
		</div>
	</div>

	<a href="#" class="btn" onClick="updateContent('<?=base_url()?>eventos_rubros_controller/show_c/<?=$evento_id?>/<?=$proyecto_id?>','contentModal')">Cancelar</a>
	<button type="submit" class="btn btn-primary" onClick="submitData('formEditeventos_rubros','contentModal')" >Guardar</button>

</form>
