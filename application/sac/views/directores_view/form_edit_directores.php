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
	<form action="<?=base_url()?>directores_controller/edit_c/<?=$directores->id?>" method="post" name="formEditdirectores" 
		id="formEditdirectores" class="form-horizontal">
		
		<input type="hidden" value="<?=$directores->id?>" name="id" id="id"/>
		
		<div class="control-group">
			<label class="control-label" for="dni"><?=$this->config->item('dni')?></label>
			<div class="controls">
		    	<input type="text" value="<?=$directores->dni?>" name="dni" id="dni"></input>
		    </div>
        </div>
		<div class="control-group">
			<label class="control-label" for="apellido"><?=$this->config->item('apellido')?></label>
			<div class="controls">
		    	<input type="text" value="<?=$directores->apellido?>" name="apellido" id="apellido"></input>
		    </div>
        </div>
        <div class="control-group">
			<label class="control-label" for="nombre"><?=$this->config->item('nombre')?></label>
			<div class="controls">
		    	<input type="text" value="<?=$directores->nombre?>" name="nombre" id="nombre"></input>
		    </div>
        </div>
		<div class="control-group">
			<label class="control-label" for="telefono"><?=$this->config->item('telefono')?></label>
			<div class="controls">
		    	<input type="text" value="<?=$directores->telefono?>" name="telefono" id="telefono"></input>
		    </div>
        </div>
		<div class="control-group">
			<label class="control-label" for="email"><?=$this->config->item('email')?></label>
			<div class="controls">
		    	<input type="text" value="<?=$directores->email?>" name="email" id="email"></input>
		    </div>
        </div>
		<div class="control-group">
        	<label class="control-label" for="habilitado">Estado</label>
            <div class="controls" >
            	<select name="habilitado" id='habilitado'>
            		<option value="1" <?php if ($directores->habilitado=="1") { echo "selected"; } ?>>Habilitado</option>
            		<option value="0" <?php if ($directores->habilitado=="0") { echo "selected"; } ?>>No Habilitado</option>
            	</select>	
            </div>
        </div>
		<div class="form-actions">
	    	<a href="<?=base_url()?>directores_controller/index" class="btn" >Cancelar</a>
	    	<button type="submit" class="btn btn-primary" >Guardar</button>
	    </div>
	</form>
</div><!--/span10-->

<?=$this->load->view('default/_footer_admin')?>

