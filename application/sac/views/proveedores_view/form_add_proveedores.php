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
	<form action="<?=base_url()?>proveedores_controller/add_c" method="post" name="formAddproveedores" id="formAddproveedores" class="form-horizontal">
		<div class="control-group">
			<label class="control-label" for="nombre"><?=$this->config->item('cuit')?>:</label>
			<div class="controls">
				<input type="text" name="cuit" id="cuit"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="nombre"><?=$this->config->item('razon_social')?>:</label>
			<div class="controls">
				<input type="text" name="razon_social" id="razon_social"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="nombre"><?=$this->config->item('domicilio')?>:</label>
			<div class="controls">
				<input type="text" name="domicilio" id="domicilio"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="nombre"><?=$this->config->item('telefono')?>:</label>
			<div class="controls">
				<input type="text" name="telefono" id="telefono"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="nombre"><?=$this->config->item('celular')?>:</label>
			<div class="controls">
				<input type="text" name="celular" id="celular"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="nombre"><?=$this->config->item('email')?>:</label>
			<div class="controls">
				<input type="text" name="email" id="email"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="nombre"><?=$this->config->item('habilitado')?>:</label>
			<div class="controls">
				<select name="habilitado" id="habilitado">
            		<option value="1" selected>Habilitado</option>
            		<option value="0"> No habilitado</option>
            	</select>
			</div>
		</div>
		
		<div class="form-actions">
		    	<a href="<?=base_url()?>proveedores_controller/index" class="btn" >Cancelar</a>
		    	<button type="submit" class="btn btn-primary" >Guardar</button>
		</div>
	</form>
</div><!--/span10-->


<?=$this->load->view('default/_footer_admin')?>