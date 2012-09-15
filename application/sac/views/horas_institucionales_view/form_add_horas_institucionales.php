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
	<form action="<?=base_url()?>horas_institucionales_controller/add_c" method="post" 
		name="formAddhoras_institucionales" id="formAddhoras_institucionales" class="stdform">

		<div class="control-group">
			<label class="control-label" for="linea_accion_docente_id"><?=$this->config->item('linea_accion_docente_id')?>:</label>
			<div class="controls">
				<input type="text" name="linea_accion_docente_id" id="linea_accion_docente_id"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="cantidad_horas"><?=$this->config->item('cantidad_horas')?>:</label>
			<div class="controls">
				<input type="text" name="cantidad_horas" id="cantidad_horas"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="linea_periodo_escuela_id"><?=$this->config->item('linea_periodo_escuela_id')?>:</label>
			<div class="controls">
				<input type="text" name="linea_periodo_escuela_id" id="linea_periodo_escuela_id"></input>
			</div>
		</div>
	
		<p class="stdformbutton">
	    	<a href="<?=base_url()?>horas_institucionales_controller/index" class="btn" >Cancelar</a>
	    	<button type="submit" class="submit radius2">Guardar</button>
	    </p>

		</form>

</div><!--/span10-->

<?=$this->load->view('default/_footer_admin')?>