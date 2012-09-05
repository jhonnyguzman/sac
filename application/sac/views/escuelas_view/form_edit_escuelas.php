<?=$this->load->view('default/_header_admin')?>

<div class="span10">
	<div class="page-header">
	  <h1><?=$title_header?></h1>
	</div>

	<?php if(validation_errors() || isset($error)): ?>
		<div class="alert alert-error">
			<a class="close" data-dismiss="alert" href="#">×</a>
			<?=validation_errors()?>
			
		</div>		
	<?php endif; ?>

	<form action="<?=base_url()?>escuelas_controller/edit_c/<?=$escuelas->id?>" method="post" name="formEditescuelas" id="formEditescuelas"  class="stdform">
		<input type="hidden" value="<?=$escuelas->id?>" name="id" id="id"/>
		<div class="control-group">
			<label class="control-label" for="cue"><?=$this->config->item('cue')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$escuelas->cue?>" name="cue" id="cue"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="nombre"><?=$this->config->item('nombre')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$escuelas->nombre?>" name="nombre" id="nombre"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="direccion"><?=$this->config->item('direccion')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$escuelas->direccion?>" name="direccion" id="direccion"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="telefono"><?=$this->config->item('telefono')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$escuelas->telefono?>" name="telefono" id="telefono"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="email"><?=$this->config->item('email')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$escuelas->email?>" name="email" id="email"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="habilitado"><?=$this->config->item('habilitado')?>:</label>
			<div class="controls">
				Si <input type='radio' name='habilitado' id='habilitado' value='1' <?php if ($escuelas->habilitado=="1") { echo "checked='checked'"; } ?> />
            	No <input type='radio' name='habilitado' id='habilitado' value='0' <?php if ($escuelas->habilitado=="0") { echo "checked='checked'"; } ?> />
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="departamento_id"><?=$this->config->item('departamento_nombre')?>:</label>
			<div class="controls">
				<select name="departamento_id" id="departamento_id" onChange="getLocalidades('<?=base_url()?>departamentos_controller/getLocalidades/')">
					<?php foreach($departamentos as $f):?>
						<?php if($f->id == $escuelas->departamento_id): ?>
							<option value="<?=$f->id?>" selected ><?=$f->nombre?></option>
						<?php else: ?>
							<option value="<?=$f->id?>"><?=$f->nombre?></option>
						<?php endif; ?>
					<?php endforeach;?>
				</select>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="localidad_id"><?=$this->config->item('localidad_nombre')?>:</label>
			<div class="controls">
				<select name="localidad_id" id="localidad_id" >
	
				</select>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="director_id"><?=$this->config->item('director_nombre')?>:</label>
			<div class="controls">
				<select name="director_id" id="director_id" >
					<?php foreach ($directores as $f): ?>
						<?php if($f->id == $escuelas->director_id): ?>
							<option value="<?=$f->id?>" selected ><?=$f->apellido." ".$f->nombre?></option>
						<?php else: ?>
							<option value="<?=$f->id?>"><?=$f->apellido." ".$f->nombre?></option>
						<?php endif; ?>
					<?php endforeach; ?>
				</select>
			</div>
		</div>
		<p class="stdformbutton">
	    	<a href="<?=base_url()?>escuelas_controller/index" class="btn" >Cancelar</a>
	    	<button type="submit" class="submit radius2">Guardar</button>
	    </p>
	</form>

</div><!--/span10-->

<script type="text/javascript">
	$(document).ready(function(){ 
		getLocalidades('<?=base_url()?>departamentos_controller/getLocalidades/','<?=$escuelas->localidad_id?>');
	});

	var cue = new LiveValidation('cue'); cue.add( Validate.Presence ); cue.add( Validate.Numericality ); cue.add( Validate.Numericality, { minimum: 900000000, maximum: 999999999 } );
	var nombre = new LiveValidation('nombre'); nombre.add( Validate.Presence ); nombre.add( Validate.Length, { maximum: 80 } );
	var direccion = new LiveValidation('direccion'); direccion.add( Validate.Presence ); direccion.add( Validate.Length, { maximum: 40 } );
	var telefono = new LiveValidation('telefono'); telefono.add( Validate.Numericality ); telefono.add( Validate.Length, { maximum: 15 } );
	var email = new LiveValidation('email'); email.add( Validate.Email ); email.add( Validate.Length, { maximum: 50 } );
	var habilitado = new LiveValidation('habilitado'); habilitado.add( Validate.Presence );
</script>


<?=$this->load->view('default/_footer_admin')?>
