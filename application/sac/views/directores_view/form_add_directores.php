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
	<form action="<?=base_url()?>directores_controller/add_c" method="post" name="formAdddirectores" id="formAdddirectores" class="form-horizontal">
		<div class="control-group">
			<label class="control-label" for="dni"><?=$this->config->item('dni')?>:</label>
			<div class="controls">
				<input type="text" name="dni" id="dni" value="<?=set_value('dni')?>" ></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="apellido"></span><?=$this->config->item('apellido')?>:</label>
			<div class="controls">
				<input type="text" name="apellido" id="apellido" value="<?=set_value('apellido')?>"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="nombre"><?=$this->config->item('nombre')?>:</label>
			<div class="controls">
				<input type="text" name="nombre" id="nombre" value="<?=set_value('nombre')?>"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="telefono"><?=$this->config->item('telefono')?>:</label>
			<div class="controls">
				<input type="text" name="telefono" id="telefono" value="<?=set_value('telefono')?>"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="email"><?=$this->config->item('email')?>:</label>
			<div class="controls">
				<input type="text" name="email" id="email" value="<?=set_value('email')?>"></input>
			</div>
		</div>
		<div class="control-group">
        	<label class="control-label" for="habilitado"><?=$this->config->item('habilitado')?></label>
            <div class="controls">
            	<input type="radio" name="habilitado" id='habilitado' value='1' /> Habilitado &nbsp;&nbsp;
            	<input type="radio" name="habilitado" id='habilitado' value='0' checked='checked' /> No Habilitado
            </div>
        </div>
		<div class="form-actions">
	    	<a href="<?=base_url()?>directores_controller/index" class="btn" >Cancelar</a>
	    	<button type="submit" class="btn btn-primary" >Guardar</button>
	    </div>
	</form>
		
</div><!--/span10-->

<?=$this->load->view('default/_footer_admin')?>
