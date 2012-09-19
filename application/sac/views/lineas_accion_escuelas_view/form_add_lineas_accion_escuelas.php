<?php if(validation_errors() || isset($error)): ?>
	<div class="alert alert-error">
		<a class="close" data-dismiss="alert" href="#">×</a>
		<?=validation_errors()?>
		
	</div>		
<?php endif; ?>
<form action="<?=base_url()?>lineas_accion_escuelas_controller/add_c/<?=$periodo_escuela_id?>/<?=$escuela_id?>" method="post" 
	name="formAddlineas_accion_escuelas" id="formAddlineas_accion_escuelas" class="form-inline">
	<div class="control-group">
		<h5><?=$this->config->item('linea_periodo_escuela_id')?>:</h5>
		<div class="controls">
			<select name="linea_periodo_escuela_id" id="linea_periodo_escuela_id">
		  		<?php foreach($lineas_periodo_escuelas as $f):?>
		  			<option value="<?=$f->id?>"><?=$f->mes_descripcion." del ".$f->anio?></option>
		  		<?php endforeach; ?>
		  </select>
		</div>
	</div>
	<div class="control-group">
		<h5><?=$this->config->item('linea_accion_id')?>:</h5>
		<div class="controls">
			<select name="linea_accion_id" class="chzn-select">
				<?php foreach($lineas_accion as $f): ?>
					<option value="<?=$f->id?>"><?=$f->nombre?></option>
				<?php endforeach; ?>
			</select>
		</div>
	</div>
	
	<p class="stdformbutton">
		<a href="javascript:void(0)" 
    	onClick="updateContent('<?=base_url()?>lineas_accion_escuelas_controller/show_c/<?=$escuela_id?>','contentModal')" class="btn" >Cancelar</a>
    	<button type="submit" class="btn" onClick="submitData('formAddlineas_accion_escuelas','contentModal')">Guardar</button>
    </p>

</form>
