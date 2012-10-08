<?=$this->load->view('default/_header_admin')?>

<div class="span28">
	<div class="page-header">
	  <h3><?=$title_header?></h3>
	</div>
	<?php if(validation_errors() || isset($error)): ?>
		<div class="alert alert-error">
			<a class="close" data-dismiss="alert" href="#">×</a>
			<?=validation_errors()?>
			
		</div>		
	<?php endif; ?>
	<form action="<?=base_url()?>docentes_titulos_controller/edit_c/<?=$docentes_titulos->id?>" method="post" 
		name="formEditdocentes_titulos" id="formEditdocentes_titulos" class="form-horizontal">
		
		<input type="hidden" value="<?=$docentes_titulos->id?>" name="id" id="id"  readonly="readonly"></input>
		
		<div class="control-group">
			<label class="control-label" for="docente_id"><?=$this->config->item('docente_id')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$docentes_titulos->docente_id?>" name="docente_id" id="docente_id"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="titulo_id"><?=$this->config->item('titulo_id')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$docentes_titulos->titulo_id?>" name="titulo_id" id="titulo_id"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="created_at"><?=$this->config->item('created_at')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$docentes_titulos->created_at?>" name="created_at" id="created_at" readonly="readonly"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="updated_at"><?=$this->config->item('updated_at')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$docentes_titulos->updated_at?>" name="updated_at" id="updated_at" readonly="readonly"></input>
			</div>
		</div>

		<div class="form-actions">
	    	<a href="<?=base_url()?>docentes_titulos_controller/index" class="btn" >Cancelar</a>
	    	<button type="submit" class="btn btn-primary" >Modificar</button>
	    </div>
	    
	</form>

</div><!--/span16-->

<?=$this->load->view('default/_footer_admin')?>
