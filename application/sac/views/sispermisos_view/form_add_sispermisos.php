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

	<form action="<?=base_url()?>sispermisos_controller/add_c" method="post" name="formAddsispermisos" 
		id="formAddsispermisos" class="form-horizontal">
		<div class="control-group">
			<label class="control-label" for="perfiles_id"><?=$this->config->item('perfiles_id')?>:</label>
			<div class="controls">
				<select name="perfiles_id" id="perfiles_id">
					<?php foreach($perfiles as $f): ?>
						<option value="<?=$f->id?>"><?=$f->descripcion?></option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="tabla"><?=$this->config->item('tabla')?>:</label>
			<div class="controls">
				<select name="tabla" id="tabla">
					<?php foreach($tablas as $f): ?>
						<option value="<?=$f?>"><?=$f?></option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="flag_read"><?=$this->config->item('flag_read')?>:</label>
			<div class="controls">
				<span class="formwrapper">
				  <input type="radio" name="flag_read" value="1" checked>
				  Si
				  <input type="radio" name="flag_read" value="0">
				  No
				</span>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="flag_insert"><?=$this->config->item('flag_insert')?>:</label>
			<div class="controls">
				<span class="formwrapper">
				  <input type="radio" name="flag_insert" value="1" checked>
				  Si
				  <input type="radio" name="flag_insert" value="0">
				  No
				</span>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="flag_update"><?=$this->config->item('flag_update')?>:</label>
			<div class="controls">
				<span class="formwrapper">
				  <input type="radio" name="flag_update" value="1" checked>
				  Si
				  <input type="radio" name="flag_update" value="0">
				  No
				</span>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="flag_delete"><?=$this->config->item('flag_delete')?>:</label>
			<div class="controls">
				<span class="formwrapper">
				  <input type="radio" name="flag_delete" value="1" checked>
				  Si
				  <input type="radio" name="flag_delete" value="0">
				  No
				</span>
			</div>
		</div>
		
		<div class="form-actions">
	    	<a href="<?=base_url()?>sispermisos_controller/index" class="btn" >Cancelar</a>
	    	<button type="submit" class="btn btn-primary" >Guardar</button>
	    </div>

	</form>

</div><!--/span10-->

<?=$this->load->view('default/_footer_admin')?>