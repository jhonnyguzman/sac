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
	<form action="<?=base_url()?>proveedores_controller/edit_c/<?=$proveedores->id?>" method="post" 
		name="formEditproveedores" id="formEditproveedores" class="form-horizontal">
		
		<input type="hidden" value="<?=$proveedores->id?>" name="id" id="id"  readonly="readonly"></input>
		
		<div class="control-group">
			<label class="control-label" for="nombre"><?=$this->config->item('cuit')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$proveedores->cuit?>" name="cuit" id="cuit"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="nombre"><?=$this->config->item('razon_social')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$proveedores->razon_social?>" name="razon_social" id="razon_social"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="nombre"><?=$this->config->item('domicilio')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$proveedores->domicilio?>" name="domicilio" id="domicilio"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="nombre"><?=$this->config->item('telefono')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$proveedores->telefono?>" name="telefono" id="telefono"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="nombre"><?=$this->config->item('celular')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$proveedores->celular?>" name="celular" id="celular"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="nombre"><?=$this->config->item('email')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$proveedores->email?>" name="email" id="email"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="nombre"><?=$this->config->item('habilitado')?>:</label>
			<div class="controls">
				<select name="habilitado" id='habilitado'>
            		<option value="1" <?php if ($proveedores->habilitado=="1") { echo "selected"; } ?>>Habilitado</option>
            		<option value="0" <?php if ($proveedores->habilitado=="0") { echo "selected"; } ?>>No Habilitado</option>
            	</select>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="nombre"><?=$this->config->item('created_at')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$proveedores->created_at?>" name="created_at" id="created_at" readonly></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="nombre"><?=$this->config->item('updated_at')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$proveedores->updated_at?>" name="updated_at" id="updated_at" readonly></input>
			</div>
		</div>
		
		<div class="form-actions">
		    	<a href="<?=base_url()?>proveedores_controller/index" class="btn" >Cancelar</a>
		    	<button type="submit" class="btn btn-primary" >Guardar</button>
		</div>
	</form>
</div><!--/span10-->


<?=$this->load->view('default/_footer_admin')?>