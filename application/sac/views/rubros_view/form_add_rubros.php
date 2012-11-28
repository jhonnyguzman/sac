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
	<form action="<?=base_url()?>rubros_controller/add_c" method="post" name="formAddrubros" id="formAddrubros" class="form-horizontal">
		<div class="control-group">
			<label class="control-label" for="nombre"><?=$this->config->item('nombre')?>:</label>
			<div class="controls">
				<input type="text" name="nombre" id="nombre"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="es_monto_transferible"><?=$this->config->item('es_monto_transferible')?>:</label>
			<div class="controls">
				<select name="es_monto_transferible" id="es_monto_transferible">
            		<option value="1" selected>Si</option>
            		<option value="0"> No</option>
            	</select>
			</div>
		</div>
		
		<div class="form-actions">
		    	<a href="<?=base_url()?>rubros_controller/index" class="btn" >Cancelar</a>
		    	<button type="submit" class="btn btn-primary" >Guardar</button>
		    </div>
	</form>
</div><!--/span10-->


<?=$this->load->view('default/_footer_admin')?>