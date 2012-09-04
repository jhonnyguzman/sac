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
<form action="<?=base_url()?>docentes_escuelas_controller/edit_c/<?=$docentes_escuelas->id?>" method="post" name="formEditdocentes_escuelas" id="formEditdocentes_escuelas">
	<div class="control-group">
			<label class="control-label" for="docente_perfil_id"><?=$this->config->item('docente_perfil_id')?>:</label>
		<input type="text" value="<?=$docentes_escuelas->docente_perfil_id?>" name="docente_perfil_id" id="docente_perfil_id"></input>
	</div>
		<div class="control-group">
			<label class="control-label" for="escuela_id"><?=$this->config->item('escuela_id')?>:</label>
		<input type="text" value="<?=$docentes_escuelas->escuela_id?>" name="escuela_id" id="escuela_id"></input>
	</div>
	<div class="form-actions">
			<a href="<?=base_url()?>docentes_escuelas_controller/index" class="btn" >Cancelar</a>
			<button type="submit" class="btn btn-primary">Modificar</button>
		</div>

	</form>

</div><!--/span10-->

<?=$this->load->view('default/_footer_admin')?>

