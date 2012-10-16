<?=$this->load->view('default/_header_admin')?>

<div class="span28">
	<div class="page-header">
	  <h1><?=$title_header?></h1>
	</div>
	
	<?php if(validation_errors() || isset($error)): ?>
		<div class="alert alert-error">
			<a class="close" data-dismiss="alert" href="#">×</a>
			<?=validation_errors()?>
			
		</div>		
	<?php endif; ?>

	<form action="<?=base_url()?>sys_perfiles_controller/edit_c/<?=$perfiles->id?>" method="post" name="formEditperfiles" id="formEditperfiles" class="form-horizontal">
		<div class="control-group">
			<label class="control-label" for="id"><?=$this->config->item('id')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$perfiles->id?>" name="id" id="id"  readonly="readonly" />
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="descripcion"><?=$this->config->item('descripcion')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$perfiles->descripcion?>" name="descripcion" id="descripcion" />
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="estado"><?=$this->config->item('estado_descripcion')?>:</label>
			<div class="controls">
				<select name="estado" id="estado" data-native-menu="false">
					<?php foreach ($estados as $f): ?>
						<?php if($f->id == $perfiles->estado): ?>
							<option value="<?=$f->id?>" selected ><?=$f->descripcion?></option>
						<?php else: ?>
							<option value="<?=$f->id?>"><?=$f->descripcion?></option>
						<?php endif; ?>
					<?php endforeach; ?>
				</select>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="created_at"><?=$this->config->item('created_at')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$perfiles->created_at?>" name="created_at" id="created_at"  readonly="true" />
			</div>
		</div>
		
		<div class="form-actions">
			<a href="<?=base_url()?>sys_perfiles_controller/index" class="btn" >Cancelar</a>
			<button type="submit" class="btn btn-primary">Guardar</button>
		</div>

	</form>

</div><!--/span28-->

<?=$this->load->view('default/_footer_admin')?>
