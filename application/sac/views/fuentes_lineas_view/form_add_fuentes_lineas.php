<?php if(validation_errors() || isset($error)): ?>
	<div class="alert alert-error">
		<a class="close" data-dismiss="alert" href="#">×</a>
		<?=validation_errors()?>
		
	</div>		
<?php endif; ?>
<form action="<?=base_url()?>fuentes_lineas_controller/add_c/<?=$fuente_id?>" method="post" name="formAddfuentes_lineas" id="formAddfuentes_lineas">
	
	<input type="hidden" name="fuente_id" id="fuente_id" value="<?=$fuente_id?>"></input>
	
	<div class="control-group">
		<label class="control-label" for="anio"><?=$this->config->item('anio')?>:</label>
		<div class="controls">
			<select name="anio" id="anio">
				<?php foreach($anios as $f): ?>
					<option value="<?=$f?>"><?=$f?></option>
				<?php endforeach; ?>
			</select>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="monto_global"><?=$this->config->item('monto_global')?>:</label>
		<div class="controls">
			<input type="text" name="monto_global" id="monto_global"></input>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="monto_especial"><?=$this->config->item('monto_especial')?>:</label>
		<div class="controls">
			<input type="text" name="monto_especial" id="monto_especial"></input>
		</div>
	</div>
	
	<a href="#" class="btn" onClick="updateContent('<?=base_url()?>fuentes_lineas_controller/show_c/<?=$fuente_id?>','contentModal')">Cancelar</a>
	<button type="submit" class="btn btn-primary" >Guardar</button>

</form>

<script>
    $(document).ready(function(){

	     $("#formAddfuentes_lineas").validate({
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