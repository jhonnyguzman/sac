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
	<form action="<?=base_url()?>sispermisos_controller/edit_c/<?=$sispermisos->id?>" method="post" name="formEditsispermisos" 
		id="formEditsispermisos" class="form-horizontal">
		
		<input type="hidden" value="<?=$sispermisos->id?>" name="id" id="id"  ></input>
		
		<div class="control-group">
			<label class="control-label" for="perfiles_id"><?=$this->config->item('perfiles_id')?>:</label>
			<div class="controls">
				<input type="text" name="perfiles_id"  value="<?=$sispermisos->perfil_descripcion?>" readonly="true">
				<input type="hidden" name="perfiles_id"  value="<?=$sispermisos->perfiles_id?>" >
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="tabla"><?=$this->config->item('tabla')?>:</label>
			<div class="controls">
				<input type="text" name="tabla"  value="<?=$sispermisos->tabla?>" readonly="true">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="flag_read"><?=$this->config->item('flag_read')?>:</label>
			<div class="controls">
				<span class="formwrapper">
				  <input type="radio" name="flag_read" value="1" <?php if($sispermisos->flag_read == 1) echo "checked"; ?> >
				  Si
				  <input type="radio" name="flag_read" value="0" <?php if($sispermisos->flag_read == 0) echo "checked"; ?> >
				  No
				</span>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="flag_insert"><?=$this->config->item('flag_insert')?>:</label>
			<div class="controls">
				<span class="formwrapper">
				  <input type="radio" name="flag_insert" value="1" <?php if($sispermisos->flag_insert == 1) echo "checked"; ?> >
				  Si
				  <input type="radio" name="flag_insert" value="0" <?php if($sispermisos->flag_insert == 0) echo "checked"; ?>>
				  No
				</span>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="flag_update"><?=$this->config->item('flag_update')?>:</label>
			<div class="controls">
				<span class="formwrapper">
				  <input type="radio" name="flag_update" value="1" <?php if($sispermisos->flag_update == 1) echo "checked"; ?> >
				  Si
				  <input type="radio" name="flag_update" value="0" <?php if($sispermisos->flag_update == 0) echo "checked"; ?>>
				  No
				</span>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="flag_delete"><?=$this->config->item('flag_delete')?>:</label>
			<div class="controls">
				<span class="formwrapper">
				  <input type="radio" name="flag_delete" value="1" <?php if($sispermisos->flag_delete == 1) echo "checked"; ?> >
				  Si
				  <input type="radio" name="flag_delete" value="0" <?php if($sispermisos->flag_delete == 0) echo "checked"; ?>>
				  No
				</span>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="created_at"><?=$this->config->item('created_at')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$sispermisos->created_at?>" name="created_at" id="created_at" readonly="true"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="updated_at"><?=$this->config->item('updated_at')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$sispermisos->updated_at?>" name="updated_at" id="updated_at" readonly="true"></input>
			</div>
		</div>
		
		<div class="form-actions">
	    	<a href="<?=base_url()?>sispermisos_controller/index" class="btn" >Cancelar</a>
	    	<button type="submit" class="btn btn-primary" >Guardar</button>
	    </div>

	</form>

</div><!--/span10-->

<?=$this->load->view('default/_footer_admin')?>