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
<form action="<?=base_url()?>directores_controller/edit_c/<?=$directores->id?>" method="post" name="formEditdirectores" id="formEditdirectores">

	<div class="control-group">
			<label class="control-label" for="dni"><?=$this->config->item('dni')?>:</label>
		<input type="text" value="<?=$directores->dni?>" name="dni" id="dni"></input>
	</div>
	<div class="control-group">
			<label class="control-label" for="apellido"><?=$this->config->item('apellido')?>:</label>
		<input type="text" value="<?=$directores->apellido?>" name="apellido" id="apellido"></input>
	</div>
	<div class="control-group">
			<label class="control-label" for="nombre"><?=$this->config->item('nombre')?>:</label>
		<input type="text" value="<?=$directores->nombre?>" name="nombre" id="nombre"></input>
	</div>
	<div class="control-group">
			<label class="control-label" for="telefono"><?=$this->config->item('telefono')?>:</label>
		<input type="text" value="<?=$directores->telefono?>" name="telefono" id="telefono"></input>
	</div>
	<div class="control-group">
			<label class="control-label" for="email"><?=$this->config->item('email')?>:</label>
		<input type="text" value="<?=$directores->email?>" name="email" id="email"></input>
	</div>
	<div class="control-group">
			<label class="control-label" for="habilitado"><?=$this->config->item('habilitado')?>:</label>
		<input type="text" value="<?=$directores->habilitado?>" name="habilitado" id="habilitado"></input>
	</div>
	<div class="form-actions">
			<a href="<?=base_url()?>directores_controller/index" class="btn" >Cancelar</a>
			<button type="submit" class="btn btn-primary">Modificar</button>
		</div>

	</form>

</div><!--/span10-->

<?=$this->load->view('default/_footer_admin')?>

