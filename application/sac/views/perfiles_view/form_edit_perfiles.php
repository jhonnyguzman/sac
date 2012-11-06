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
	<form action="<?=base_url()?>perfiles_controller/edit_c/<?=$perfiles->id?>" 
		method="post" name="formEditperfiles" id="formEditperfiles" class="form-horizontal">

		<input type="hidden" value="<?=$perfiles->id?>" name="id" id="id"  readonly="readonly"></input>
		
		<div class="control-group">
			<label class="control-label" for="nombre"><?=$this->config->item('nombre')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$perfiles->nombre?>" name="nombre" id="nombre"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="descripcion"><?=$this->config->item('descripcion')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$perfiles->descripcion?>" name="descripcion" id="descripcion"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="cantidad_hora"><?=$this->config->item('cantidad_hora')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$perfiles->cantidad_hora?>" name="cantidad_hora" id="cantidad_hora"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="habilitado">Estado:</label>
			<div class="controls">
	        	<select name="habilitado" id='habilitado'>
            		<option value="1" <?php if ($perfiles->habilitado=="1") { echo "selected"; } ?>>Habilitado</option>
            		<option value="0" <?php if ($perfiles->habilitado=="0") { echo "selected"; } ?>>No Habilitado</option>
            	</select>
        	</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="created_at"><?=$this->config->item('created_at')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$perfiles->created_at?>" name="created_at" id="created_at" readonly="readonly"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="updated_at"><?=$this->config->item('updated_at')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$perfiles->updated_at?>" name="updated_at" id="updated_at" readonly="readonly"></input>
			</div>
		</div>
		
		<div class="form-actions">
	    	<a href="<?=base_url()?>perfiles_controller/index" class="btn" >Cancelar</a>
	    	<button type="submit" class="btn btn-primary">Guardar</button>
	    </div>

	</form>

</div><!--/span10-->

<?=$this->load->view('default/_footer_admin')?>