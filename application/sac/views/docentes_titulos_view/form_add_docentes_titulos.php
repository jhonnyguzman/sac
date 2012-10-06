<?=$this->load->view('default/_header_admin')?>

<div class="span16">
	<div class="page-header">
	  <h3><?=$title_header?></h3>
	</div>
	<?php if(validation_errors() || isset($error)): ?>
		<div class="alert alert-error">
			<a class="close" data-dismiss="alert" href="#">×</a>
			<?=validation_errors()?>
			
		</div>		
	<?php endif; ?>
	<form action="<?=base_url()?>docentes_titulos_controller/add_c" method="post" name="formAdddocentes_titulos" id="formAdddocentes_titulos"
		class="form-horizontal">
		
		<div class="control-group">
			<label class="control-label" for="docente_id"><?=$this->config->item('docente_id')?>:</label>
			<div class="controls">
				<input type="text" name="docente_id" id="docente_id"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="titulo_id"><?=$this->config->item('titulo_id')?>:</label>
			<div class="controls">
				<input type="text" name="titulo_id" id="titulo_id"></input>
			</div>
		</div>
		
		<div class="form-actions">
	    	<a href="<?=base_url()?>docentes_titulos_controller/index" class="btn" >Cancelar</a>
	    	<button type="submit" class="btn btn-primary" >Guardar</button>
	    </div>

	</form>

</div><!--/span16-->

<?=$this->load->view('default/_footer_admin')?>
