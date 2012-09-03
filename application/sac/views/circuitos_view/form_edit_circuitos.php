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
<form action="<?=base_url()?>circuitos_controller/edit_c/<?=$circuitos->id?>" method="post" name="formEditcircuitos" id="formEditcircuitos">

	<div class="control-group">
		<label class="control-label" for="nombre"><?=$this->config->item('nombre')?>:</label>
		<div class="controls">
			<input type="text" value="<?=$circuitos->nombre?>" name="nombre" id="nombre"></input>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="habilitado"><?=$this->config->item('habilitado')?>:</label>
		<div class="controls">
			Si <input type='radio' name='habilitado' id='habilitado' value='1' <?php if ($circuitos->habilitado=="1") { echo "checked='checked'"; } ?> />
        	No <input type='radio' name='habilitado' id='habilitado' value='0' <?php if ($circuitos->habilitado=="0") { echo "checked='checked'"; } ?> />
		</div>
	</div>

	<div class="form-actions">
			<a href="<?=base_url()?>circuitos_controller/index" class="btn" >Cancelar</a>
			<button type="submit" class="btn btn-primary">Modificar</button>
		</div>
		
	</form>

</div><!--/span10-->


<SCRIPT LANGUAGE='JavaScript'>
	var nombre = new LiveValidation('nombre'); nombre.add( Validate.Presence ); nombre.add( Validate.Length, { maximum: 10 } );
</SCRIPT>
<?=$this->load->view('default/_footer_admin')?>