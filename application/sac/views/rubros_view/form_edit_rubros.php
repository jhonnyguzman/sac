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
	<form action="<?=base_url()?>rubros_controller/edit_c/<?=$rubros->id?>" method="post" name="formEditrubros" id="formEditrubros" class="form-horizontal">
		
		<input type="hidden" value="<?=$rubros->id?>" name="id" id="id"  readonly="readonly"></input>
		
		<div class="control-group">
			<label class="control-label" for="nombre"><?=$this->config->item('nombre')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$rubros->nombre?>" name="nombre" id="nombre"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="es_monto_transferible"><?=$this->config->item('es_monto_transferible')?>:</label>
			<div class="controls">
				<select name="es_monto_transferible" id='es_monto_transferible'>
            		<option value="1" <?php if ($rubros->es_monto_transferible=="1") { echo "selected"; } ?>>Si</option>
            		<option value="0" <?php if ($rubros->es_monto_transferible=="0") { echo "selected"; } ?>>No </option>
            	</select>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="created_at"><?=$this->config->item('created_at')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$rubros->created_at?>" name="created_at" id="created_at" readonly="readonly"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="updated_at"><?=$this->config->item('updated_at')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$rubros->updated_at?>" name="updated_at" id="updated_at"  readonly="readonly"></input>
			</div>
		</div>

		<div class="form-actions">
	    	<a href="<?=base_url()?>rubros_controller/index" class="btn" >Cancelar</a>
	    	<button type="submit" class="btn btn-primary" >Guardar</button>
		</div>
	</form>
</div><!--/span10-->


<?=$this->load->view('default/_footer_admin')?>