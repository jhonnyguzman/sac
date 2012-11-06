
<?php if(validation_errors() || isset($error)): ?>
	<div class="alert alert-error">
		<a class="close" data-dismiss="alert" href="#">×</a>
		<?=validation_errors()?>
		
	</div>		
<?php endif; ?>
<form action="<?=base_url()?>lineas_accion_docentes_controller/add_c/<?=$linea_accion_escuela_id?>" method="post" 
		name="formAddlineas_accion_docentes" id="formAddlineas_accion_docentes" class="form-inline">

	<div id="step1">	
		<input type="hidden" name="linea_accion_escuela_id" value="<?=$linea_accion_escuela_id?>">

		<div class="control-group">
			<h5>Docente:</h5>
			<select name="docente_id" id="docente_id" >
				<?php foreach($docentes as $f): ?>
					<option value="<?=$f->id?>"><?=$f->apellido." ".$f->nombre?></option>
				<?php endforeach; ?>
			</select>
		</div>
		<div class="control-group">
			<h5>Perfil:</h5>
			<select name="perfil_id" id="perfil_id">
				<?php foreach($perfiles as $f): ?>
					<option value="<?=$f->id?>"><?=$f->nombre?></option>
				<?php endforeach; ?>
			</select>
		</div>
		<div class="control-group">    
			<h5>Horas:</h5>
			<input type="text" name="cantidad_horas" id="cantidad_horas" class="input-small">
		</div>

		<p class="stdformbutton">
			<a href="javascript:void(0)" 
	    	onClick="updateContent('<?=base_url()?>lineas_accion_docentes_controller/show_c/<?=$linea_accion_escuela_id?>','contentModal')" class="btn" >Cancelar</a>
	    	<button type="button" class="btn" onClick="checkExisteHoras('<?=base_url()?>', <?=$linea_accion_escuela_id?>)">Guardar</button>
	    </p>

		
	</div>
	<div id="step2">
		<div id="my-alert" class="alert alert-block alert-info fade in">
			<h4 class=\"alert-heading\">Atención!</h4>
			<p>No existen horas disponibles para asignar del mes en cuestión. ¿Deseas asignar horas institucionales sobrantes de periódos anteriores?</p>
			<p><a class="btn btn-info" href="#" id="actSi">Si</a> <a class="btn" href="#" id="actNo">No</a></p>
		</div>
	</div> 
	<div id="step3">
		
	</div>

</form>
 <script>
    $(document).ready(function(){ 

	  $("#actNo").click(function(){
	  		$("#step2").hide(500);
       		$("#step1").show(500);
	  });
	  $("#actSi").click(function(){
	  		$("#step2").hide(500);
       		$("#step3").show(500);
	  });
	  $("#actBack").live("click",function(){
	  		$("#step3").hide(500);
       		$("#step1").show(500);
	  });
	  
    });
    
</script>