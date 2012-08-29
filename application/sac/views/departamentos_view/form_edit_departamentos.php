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
<form action="<?=base_url()?>departamentos_controller/edit_c/<?=$departamentos->id?>" method="post" name="formEditdepartamentos" id="formEditdepartamentos">
	<div class="control-group">
			<label class="control-label" for="nombre"><?=$this->config->item('nombre')?>:</label>
		<input type="text" value="<?=$departamentos->nombre?>" name="nombre" id="nombre"></input>
	</div>
	<div class="control-group">
			<label class="control-label" for="habilitado"><?=$this->config->item('habilitado')?>:</label>
		<input type="text" value="<?=$departamentos->habilitado?>" name="habilitado" id="habilitado"></input>
	</div>
	<div class="control-group">
			<label class="control-label" for="circuito_id"><?=$this->config->item('circuito_id')?>:</label>
		<input type="text" value="<?=$departamentos->circuito_id?>" name="circuito_id" id="circuito_id"></input>
	</div>
	
	<div class="form-actions">
			<a href="<?=base_url()?>departamentos_controller/index" class="btn" >Cancelar</a>
			<button type="submit" class="btn btn-primary">Modificar</button>
		</div>

	</form>

</div><!--/span10-->

<?=$this->load->view('default/_footer_admin')?>
