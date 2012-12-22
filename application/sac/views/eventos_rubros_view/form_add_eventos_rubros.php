<?php if(validation_errors() || isset($error)): ?>
	<div class="alert alert-error">
		<a class="close" data-dismiss="alert" href="#">×</a>
		<?=validation_errors()?>
		
	</div>		
<?php endif; ?>
<form action="<?=base_url()?>eventos_rubros_controller/add_c/<?=$evento_id?>/<?=$proyecto_id?>" method="post" 
	name="formAddeventos_rubros" id="formAddeventos_rubros" >

	<input type="hidden" name="evento_id" id="evento_id" value="<?=$evento_id?>"></input>
	
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
	<div class="control-group">
		<label class="control-label" for="fuente_rubro_id">Fuente de financiamiento:</label>
		<div class="controls">
			<select name="fuente_rubro_id" id="fuente_rubro_id">
			</select>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="costo"><?=$this->config->item('costo')?>:</label>
		<div class="controls">
			<input type="text" name="costo" id="costo"  />		
		</div>
	</div>

	<a href="#" class="btn" onClick="updateContent('<?=base_url()?>eventos_rubros_controller/show_c/<?=$evento_id?>/<?=$proyecto_id?>','contentModal')">Cancelar</a>
	<button type="submit" class="btn btn-primary" onClick="submitData('formAddeventos_rubros','contentModal')" >Guardar</button>

</form>

<script type="text/javascript">
	$(document).ready(function(){
		getFuentesRubros("<?=base_url()?>fuentes_rubros_controller/getFuentesByRubro/", "", "rubro_id", "fuente_rubro_id");
		$("#rubro_id").change(function(){
			getFuentesRubros("<?=base_url()?>fuentes_rubros_controller/getFuentesByRubro/", "", "rubro_id", "fuente_rubro_id");
		});
	});	
</script>