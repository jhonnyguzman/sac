<?php if(validation_errors() || isset($error)): ?>
	<div class="alert alert-error">
		<a class="close" data-dismiss="alert" href="#">×</a>
		<?=validation_errors()?>
		
	</div>		
<?php endif; ?>
<form action="<?=base_url()?>fuentes_lineas_controller/edit_c/<?=$fuentes_lineas->id?>/<?=$fuente_id?>" 
	method="post" name="formEditfuentes_lineas" id="formEditfuentes_lineas">
	
	<input type="hidden" value="<?=$fuentes_lineas->id?>" name="id" id="id" ></input>
	<input type="hidden" value="<?=$fuentes_lineas->fuente_id?>" name="fuente_id" id="fuente_id"></input>
	
	<div class="control-group">
		<label class="control-label" for="anio"><?=$this->config->item('anio')?>:</label>
		<div class="controls">
			<select name="anio" id="anio">
				<?php foreach($anios as $f): ?>
					<?php if($f == $fuentes_lineas->anio): ?>
						<option value="<?=$f?>" selected><?=$f?></option>
					<?php else: ?>
						<option value="<?=$f?>"><?=$f?></option>
					<?php endif; ?>
				<?php endforeach; ?>
			</select>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="anio"><?=$this->config->item('monto_global')?>:</label>
		<div class="controls">
			<input type="text" value="<?=$fuentes_lineas->monto_global?>" name="monto_global" id="monto_global"></input>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="monto_global"><?=$this->config->item('monto_especial')?>:</label>
		<div class="controls">
			<input type="text" value="<?=$fuentes_lineas->monto_especial?>" name="monto_especial" id="monto_especial"></input>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="estado"><?=$this->config->item('estado')?>:</label>
		<div class="controls">
			<input type="hidden" value="<?=$fuentes_lineas->estado?>" name="estado" id="estado"></input>
			<input type="text" value="<?=$fuentes_lineas->estado_descripcion?>" name="estado_descripcion" id="estado_descripcion" readonly></input>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="created_at"><?=$this->config->item('created_at')?>:</label>
		<div class="controls">
			<input type="text" value="<?=$fuentes_lineas->created_at?>" name="created_at" id="created_at" readonly></input>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="updated_at"><?=$this->config->item('updated_at')?>:</label>
		<div class="controls">
			<input type="text" value="<?=$fuentes_lineas->updated_at?>" name="updated_at" id="updated_at" readonly></input>
		</div>
	</div>
	
	<a href="#" class="btn" onClick="updateContent('<?=base_url()?>fuentes_lineas_controller/show_c/<?=$fuente_id?>','contentModal')">Cancelar</a>
	<button type="submit" class="btn btn-primary" >Guardar</button>

</form>


<script>
    $(document).ready(function(){

	     $("#formEditfuentes_lineas").validate({
			submitHandler: function(form) {
			   $.ajax({
			        type: 'POST',
			        url: $(form).attr('action'),
			        data: $(form).serialize(),
			        success: function(data) {
			               $("#contentModal").html(data);
			        }
			   });
			},
			rules: {
		      monto_global: {
		        number: true,
		        required: true
		      },
		      monto_especial: {
		        number: true,
		        required: true
		      }
		    },
		    highlight: function(label) {
		    	$(label).closest('.control-group').addClass('error');
		    },
		    success: function(label) {
		    	label
		    		.closest('.control-group').addClass('success');
		    }

		 });
    });
    
</script>