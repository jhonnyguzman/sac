<?=$this->load->view('default/_header_admin')?>

<div class="span16">
	<div class="page-header">
	  <h3><?=$title_header?></h3>
	</div>
	<form action="<?=base_url()?>escuelas_controller/add_c" method="post" name="formAddescuelas" id="formAddescuelas" class="form-horizontal">
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
		<div class="form-actions">
	    	<a href="<?=base_url()?>escuelas_controller/index" class="btn" >Cancelar</a>
	    	<button type="submit" class="btn btn-primary" >Guardar</button>
	    </p>
	</form>

</div><!--/span10-->

<script type="text/javascript">
	$(document).ready(function(){ 
		getLocalidades('<?=base_url()?>departamentos_controller/getLocalidades/');
		$(".chzn-select").chosen();

	});
</script>

<?=$this->load->view('default/_footer_admin')?>

