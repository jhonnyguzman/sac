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
	<form action="<?=base_url()?>personas_controller/edit_c/<?=$personas->id?>" method="post" name="formEditpersonas" id="formEditpersonas" class="form-horizontal">
		
		<input type="hidden" value="<?=$personas->id?>" name="id" id="id"  readonly="readonly"></input>
		
		<div class="control-group">
			<label class="control-label" for="nombre"><?=$this->config->item('dni')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$personas->dni?>" name="dni" id="dni"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="nombre"><?=$this->config->item('apellido')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$personas->apellido?>" name="apellido" id="apellido"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="nombre"><?=$this->config->item('nombre')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$personas->nombre?>" name="nombre" id="nombre"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="nombre"><?=$this->config->item('domicilio')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$personas->domicilio?>" name="domicilio" id="domicilio"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="nombre"><?=$this->config->item('telefono')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$personas->telefono?>" name="telefono" id="telefono"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="nombre"><?=$this->config->item('celular')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$personas->celular?>" name="celular" id="celular"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="nombre"><?=$this->config->item('email')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$personas->email?>" name="email" id="email"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="nombre"><?=$this->config->item('habilitado')?>:</label>
			<div class="controls">
				<select name="habilitado" id='habilitado'>
            		<option value="1" <?php if ($personas->habilitado=="1") { echo "selected"; } ?>>Habilitado</option>
            		<option value="0" <?php if ($personas->habilitado=="0") { echo "selected"; } ?>>No Habilitado</option>
            	</select>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="nombre"><?=$this->config->item('created_at')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$personas->created_at?>" name="created_at" id="created_at" readonly></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="nombre"><?=$this->config->item('updated_at')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$personas->updated_at?>" name="updated_at" id="updated_at" readonly></input>
			</div>
		</div>
		
		<div class="form-actions">
		    	<a href="<?=base_url()?>personas_controller/index" class="btn" >Cancelar</a>
		    	<button type="submit" class="btn btn-primary" >Guardar</button>
		</div>
	</form>
</div><!--/span10-->


<?=$this->load->view('default/_footer_admin')?>
