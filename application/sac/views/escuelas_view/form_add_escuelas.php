<?=$this->load->view('default/_header_admin')?>

<div class="span10">
	<div class="page-header">
	  <h1><?=$title_header?></h1>
	</div>
	<form action="<?=base_url()?>escuelas_controller/add_c" method="post" name="formAddescuelas" id="formAddescuelas" class="stdform">
		<div class="control-group">
			<label class="control-label" for="cue"><?=$this->config->item('cue')?>:</label>
			<div class="controls">
				<input type="text" name="cue" id="cue"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="nombre"><?=$this->config->item('nombre')?>:</label>
			<div class="controls">
				<input type="text" name="nombre" id="nombre"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="direccion"><?=$this->config->item('direccion')?>:</label>
			<div class="controls">
				<input type="text" name="direccion" id="direccion"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="telefono"><?=$this->config->item('telefono')?>:</label>
			<div class="controls">
				<input type="text" name="telefono" id="telefono"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="email"><?=$this->config->item('email')?>:</label>
			<div class="controls">
				<input type="text" name="email" id="email"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="habilitado"><?=$this->config->item('habilitado')?>:</label>
			<div class="controls">
				Si <input type='radio' name='habilitado' id='habilitado' value='1' />
            	No <input type='radio' name='habilitado' id='habilitado' value='0' checked='checked' />
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="departamento_id"><?=$this->config->item('departamento_nombre')?>:</label>
			<div class="controls">
				<select name="departamento_id" id="departamento_id" 
				onChange="getLocalidades('<?=base_url()?>departamentos_controller/getLocalidades/')"
				class="chzn-select" >
					<?php foreach($departamentos as $f):?>
						<option value="<?=$f->id?>"><?=$f->nombre?></option>
					<?php endforeach;?>
				</select>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="localidad_id"><?=$this->config->item('localidad_nombre')?>:</label>
			<div class="controls">
				<select name="localidad_id" id="localidad_id" class="chzn-select">
				</select>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="director_id"><?=$this->config->item('director_nombre')?>:</label>
			<div class="controls">
				<select name="director_id" id="director_id" class="chzn-select">
					<?php foreach($directores as $f):?>
						<option value="<?=$f->id?>"><?=$f->apellido." ".$f->nombre?></option>
					<?php endforeach;?>
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
		getLocalidades('<?=base_url()?>departamentos_controller/getLocalidades/');
		$(".chzn-select").chosen();

	});
</script>

<SCRIPT LANGUAGE='JavaScript'>
	var cue = new LiveValidation('cue'); cue.add( Validate.Presence ); cue.add( Validate.Numericality ); cue.add( Validate.Numericality, { minimum: 900000000, maximum: 999999999 } );
	var nombre = new LiveValidation('nombre'); nombre.add( Validate.Presence ); nombre.add( Validate.Length, { maximum: 80 } );
	var direccion = new LiveValidation('direccion'); direccion.add( Validate.Presence ); direccion.add( Validate.Length, { maximum: 40 } );
	var telefono = new LiveValidation('telefono'); telefono.add( Validate.Numericality ); telefono.add( Validate.Length, { maximum: 15 } );
	var email = new LiveValidation('email'); email.add( Validate.Email ); email.add( Validate.Length, { maximum: 50 } );
</SCRIPT>
<?=$this->load->view('default/_footer_admin')?>

