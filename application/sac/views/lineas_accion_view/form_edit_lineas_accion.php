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
<form action="<?=base_url()?>lineas_accion_controller/edit_c/<?=$lineas_accion->id?>" method="post" name="formEditlineas_accion" id="formEditlineas_accion">
	<div class="control-group">
			<label class="control-label" for="nombre"><?=$this->config->item('nombre')?>:</label>
		<input type="text" value="<?=$lineas_accion->nombre?>" name="nombre" id="nombre"></input>
	</div>
	<div class="control-group">
			<label class="control-label" for="descripcion"><?=$this->config->item('descripcion')?>:</label>
		<input type="text" value="<?=$lineas_accion->descripcion?>" name="descripcion" id="descripcion"></input>
	</div>
	<div class="control-group">
			<label class="control-label" for="habilitado"><?=$this->config->item('habilitado')?>:</label>
		<input type="text" value="<?=$lineas_accion->habilitado?>" name="habilitado" id="habilitado"></input>
	</div>
	<div class="control-group">
			<label class="control-label" for="ciclo"><?=$this->config->item('ciclo')?>:</label>
		<input type="text" value="<?=$lineas_accion->ciclo?>" name="ciclo" id="ciclo"></input>
	</div>
	<div class="form-actions">
			<a href="<?=base_url()?>lineas_accion_controller/index" class="btn" >Cancelar</a>
			<button type="submit" class="btn btn-primary">Modificar</button>
		</div>

	</form>

</div><!--/span10-->

<?=$this->load->view('default/_footer_admin')?>