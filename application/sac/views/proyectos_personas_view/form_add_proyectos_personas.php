<?php if(validation_errors() || isset($error)): ?>
	<div class="alert alert-error">
		<a class="close" data-dismiss="alert" href="#">×</a>
		<?=validation_errors()?>
		
	</div>		
<?php endif; ?>
<form action="<?=base_url()?>proyectos_personas_controller/add_c/<?=$proyecto_id?>" method="post" 
	name="formAddproyectos_personas" id="formAddproyectos_personas"  class="form-horizontal">
	
	<input type="hidden" name="proyecto_id" id="proyecto_id" value="<?=$proyecto_id?>"></input>
	
	<div class="control-group">
		<label class="control-label" for="persona_id"><?=$this->config->item('persona_id')?>:</label>
		<div class="controls">
			<select name="persona_id" id="persona_id">
				<?php foreach($personas as $f): ?>
					<option value="<?=$f->id?>"><?=$f->apellido." ".$f->nombre?></option>
				<?php endforeach; ?>
			</select>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="persona_id">Tipo:</label>
		<div class="controls">
			<label class="radio">
			  <input type="radio" name="tipo" id="radioTipo" value="contratado" >
			  Contratado
			</label>
			<label class="radio">
			  <input type="radio" name="tipo" id="radioTipo" value="adscripto">
			  Adscripto
			</label>
		</div>
	</div>
	<div class="contratado">
		<div class="control-group">
			<label class="control-label" for="fecha_inicio">Fecha inicio:</label>
			<div class="controls">
				<input type="text" name="fecha_inicio">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="fecha_fin">Fecha fin:</label>
			<div class="controls">
				<input type="text" name="fecha_fin">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="monto_total">Monto total:</label>
			<div class="controls">
				<input type="text" name="monto_total">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="cantidad_horas_contratado">Cantidad de horas:</label>
			<div class="controls">
				<input type="text" name="cantidad_horas_contratado">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="funcion">Función:</label>
			<div class="controls">
				<input type="text" name="funcion">
			</div>
		</div>
	</div>
	<div class="adscripto">
		<div class="control-group">
			<label class="control-label" for="persona_id">Escuela:</label>
			<div class="controls">
				<select name="escuela_id" id="escuela_id">
					<?php foreach($escuelas as $f): ?>
						<option value="<?=$f->id?>"><?=$f->nombre?></option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="persona_id">Cantidad de horas:</label>
			<div class="controls">
				<input type="text" name="cantidad_horas_adscripto">
			</div>
		</div>

	</div>

	<div class="form-actions">
    	<a href="#" class="btn" onClick="updateContent('<?=base_url()?>proyectos_personas_controller/show_c/<?=$proyecto_id?>','contentModal')">Cancelar</a>
    	<button type="submit" class="btn btn-primary" >Guardar</button>
	</div>
</form>

<script>
    $(document).ready(function(){ 
     
	     $("input:radio[name=tipo]").click(function(){
	     	var check = $(this);
	     	if(check.val() == "contratado") {
	   	  	  	$(".adscripto").hide(300);
	   	  		$(".contratado").show(400);
	   	  	}else if(check.val() == "adscripto"){
				$(".contratado").hide(300);
				$(".adscripto").show(400);
	   	  	}
	     });

	     $("#formAddproyectos_personas").validate({
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
			        return  $("input:radio[name=tipo]:checked").val() == "contratado";
			    }
		      },
		      fecha_fin: {
		        dateITA: true,
		        required: function(element) {
			        return  $("input:radio[name=tipo]:checked").val() == "contratado";
			    }
		      },
		      monto_total: {
		        number: true,
		        required: function(element) {
			        return  $("input:radio[name=tipo]:checked").val() == "contratado";
			    }
		      },
		      cantidad_horas_contratado: {
		        digits: true,
		        required: function(element) {
			        return  $("input:radio[name=tipo]:checked").val() == "contratado";
			    }
		      },
		      cantidad_horas_adscripto: {
		        digits: true,
		        required: function(element) {
			        return $("input:radio[name=tipo]:checked").val() == "adscripto";
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