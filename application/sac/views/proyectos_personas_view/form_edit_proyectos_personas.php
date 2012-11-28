<?php if(validation_errors() || isset($error)): ?>
	<div class="alert alert-error">
		<a class="close" data-dismiss="alert" href="#">×</a>
		<?=validation_errors()?>
		
	</div>		
<?php endif; ?>
<form action="<?=base_url()?>proyectos_personas_controller/edit_c/<?=$proyectos_personas->id?>/<?=$proyectos_personas->proyecto_id?>" 
	method="post" name="formEditproyectos_personas" id="formEditproyectos_personas" class="form-horizontal">
	
	<input type="hidden" value="<?=$proyectos_personas->id?>" name="id" id="id"  readonly="readonly"></input>
	<input type="hidden" value="<?=$proyectos_personas->proyecto_id?>" name="proyecto_id" id="proyecto_id"></input>
	
	<div class="control-group">
		<label class="control-label" for="persona_id"><?=$this->config->item('persona_id')?>:</label>
		<div class="controls">
			<span class="input-medium uneditable-input"><?=$proyectos_personas->persona_apellido." ".$proyectos_personas->persona_nombre?></span>
			<input type="hidden" value="<?=$proyectos_personas->persona_id?>" name="persona_id" id="persona_id"></input>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="persona_id">Tipo:</label>
		<div class="controls">
			<span class="input-medium uneditable-input"><?php if($tipo == "contratado") echo "Contratado"; else echo "Adscripto"; ?></span>
			<input type="hidden" name="tipo" id="tipo" value="<?=$tipo?>">
		</div>
	</div>
	<?php if($tipo == "contratado"): ?>
		
		<input type="hidden" name="contratado_id" value="<?=$contratados->id?>">
		
		<div class="control-group">
			<label class="control-label" for="persona_id">Fecha inicio:</label>
			<div class="controls">
				<input type="text" name="fecha_inicio" value="<?=$contratados->fecha_inicio?>">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="persona_id">Fecha fin:</label>
			<div class="controls">
				<input type="text" name="fecha_fin" value="<?=$contratados->fecha_fin?>">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="persona_id">Monto total:</label>
			<div class="controls">
				<input type="text" name="monto_total"  value="<?=$contratados->monto_total?>">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="persona_id">Cantidad de horas:</label>
			<div class="controls">
				<input type="text" name="cantidad_horas_contratado" value="<?=$contratados->cantidad_horas?>">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="persona_id">Función:</label>
			<div class="controls">
				<input type="text" name="funcion" value="<?=$contratados->funcion?>">
			</div>
		</div>
	<?php elseif($tipo == "adscripto"): ?>

		<input type="hidden" name="adscripto_id" value="<?=$adscriptos->id?>">
		
		<div class="control-group">
			<label class="control-label" for="persona_id">Escuela:</label>
			<div class="controls">
				<select name="escuela_id" id="escuela_id">
					<?php foreach($escuelas as $f): ?>
						<?php if($f->id == $adscriptos->escuela_id): ?>
							<option value="<?=$f->id?>" selected><?=$f->nombre?></option>
						<?php else: ?>
							<option value="<?=$f->id?>" ><?=$f->nombre?></option>
						<?php endif; ?>
					<?php endforeach; ?>
				</select>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="persona_id">Cantidad de horas:</label>
			<div class="controls">
				<input type="text" name="cantidad_horas_adscripto" value="<?=$adscriptos->cantidad_horas?>">
			</div>
		</div>
	<?php endif; ?>

	<div class="control-group">
		<label class="control-label" for="updated_at"><?=$this->config->item('created_at')?>:</label>
		<div class="controls">
			<input type="text" value="<?=$proyectos_personas->created_at?>" name="created_at" id="created_at" readonly></input>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="persona_id"><?=$this->config->item('updated_at')?>:</label>
		<div class="controls">
			<input type="text" value="<?=$proyectos_personas->updated_at?>" name="updated_at" id="updated_at" readonly></input>
		</div>
	</div>
	<div class="form-actions">
    	<a href="#" class="btn" onClick="updateContent('<?=base_url()?>proyectos_personas_controller/show_c/<?=$proyecto_id?>','contentModal')">Cancelar</a>
    	<button type="submit" class="btn btn-primary">Guardar</button>
	</div>
</form>

<script>
    $(document).ready(function(){ 

	     $("#formEditproyectos_personas").validate({
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
		      tipo: {
		        required: true
		      },
		      fecha_inicio: {
		      	dateITA: true,
		        required: function(element) {
			        return  $("#tipo").val() == "contratado";
			    }
		      },
		      fecha_fin: {
		        dateITA: true,
		        required: function(element) {
			        return  $("#tipo").val() == "contratado";
			    }
		      },
		      monto_total: {
		        number: true,
		        required: function(element) {
			        return $("#tipo").val() == "contratado";
			    }
		      },
		      cantidad_horas_contratado: {
		        digits: true,
		        required: function(element) {
			        return  $("#tipo").val() == "contratado";
			    }
		      },
		      cantidad_horas_adscripto: {
		        digits: true,
		        required: function(element) {
			        return  $("#tipo").val() == "adscripto";
			    }
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