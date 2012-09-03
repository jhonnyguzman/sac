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
<form action="<?=base_url()?>localidades_controller/edit_c/<?=$localidades->id?>" method="post" name="formEditlocalidades" id="formEditlocalidades">
	<div class="control-group">
			<label class="control-label" for="nombre"><?=$this->config->item('nombre')?>:</label>
		<input type="text" value="<?=$localidades->nombre?>" name="nombre" id="nombre"></input>
	</div>
	<div class="control-group">
		<label class="control-label" for="habilitado"><?=$this->config->item('habilitado')?>:</label>
		<div class="controls">
			Si <input type='radio' name='habilitado' id='habilitado' value='1' <?php if ($localidades->habilitado=="1") { echo "checked='checked'"; } ?> />
        	No <input type='radio' name='habilitado' id='habilitado' value='0' <?php if ($localidades->habilitado=="0") { echo "checked='checked'"; } ?> />
		</div>
	</div>
	<div class="control-group">
			<label class="control-label" for="departamento_id"><?=$this->config->item('departamento_id')?>:</label>
		<input type="text" value="<?=$localidades->departamento_id?>" name="departamento_id" id="departamento_id"></input>
	</div>

	<div class="form-actions">
			<a href="<?=base_url()?>localidades_controller/index" class="btn" >Cancelar</a>
			<button type="submit" class="btn btn-primary">Modificar</button>
		</div>

	</form>
	
<SCRIPT LANGUAGE='JavaScript'>
	var nombre = new LiveValidation('nombre'); nombre.add( Validate.Presence ); nombre.add( Validate.Length, { maximum: 16 } );
	var departamento_id = new LiveValidation('departamento_id'); departamento_id.add( Validate.Presence );
</SCRIPT>

</div><!--/span10-->

<?=$this->load->view('default/_footer_admin')?>