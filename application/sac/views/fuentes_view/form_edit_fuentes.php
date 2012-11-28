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
	<form action="<?=base_url()?>fuentes_controller/edit_c/<?=$fuentes->id?>" method="post" name="formEditfuentes" id="formEditfuentes" class="form-horizontal">
		
		<input type="hidden" value="<?=$fuentes->id?>" name="id" id="id"  readonly="readonly"></input>
		
		<div class="control-group">
			<label class="control-label" for="nombre"><?=$this->config->item('nombre')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$fuentes->nombre?>" name="nombre" id="nombre"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="created_at"><?=$this->config->item('created_at')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$fuentes->created_at?>" name="created_at" id="created_at"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="updated_at"><?=$this->config->item('updated_at')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$fuentes->updated_at?>" name="updated_at" id="updated_at"></input>
			</div>
		</div>
		<div class="form-actions">
	    	<a href="<?=base_url()?>fuentes_controller/index" class="btn" >Cancelar</a>
	    	<button type="submit" class="btn btn-primary" >Guardar</button>
	    </div>
	</form>
</div><!--/span10-->


<?=$this->load->view('default/_footer_admin')?>
