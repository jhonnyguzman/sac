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
	<form action="<?=base_url()?>sismenu_controller/edit_c/<?=$sismenu->id?>/" 
		method="post" name="formEditsismenu" id="formEditsismenu" class="form-horizontal">
		
		<input type="hidden" value="<?=$sismenu->id?>" name="id" id="id"></input>
		
		<div class="control-group">
			<label class="control-label" for="descripcion"><?=$this->config->item('descripcion')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$sismenu->descripcion?>" name="descripcion" id="descripcion"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="estado"><?=$this->config->item('estado')?>:</label>
			<div class="controls">
				<?php foreach($estados as $f): ?>
					<?php if($f->id == $sismenu->estado): ?>
						<?=$f->descripcion?><input type="radio" name="estado" value="<?=$f->id?>" checked>
					<?php else: ?>
						<?=$f->descripcion?><input type="radio" name="estado" value="<?=$f->id?>" >
					<?php endif; ?>
				<?php endforeach; ?>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="parent"><?=$this->config->item('parent')?>:</label>
			<div class="controls">
				<select  name="parent" id="parent">
					<?php if($sismenu->parent != 0): ?>
						<?php foreach($parents as $f): ?>
							<?php if($f->id == $sismenu->parent): ?>
								<option value="<?=$f->id?>" selected><?=$f->descripcion?></option>
							<?php else: ?>
								<option value="<?=$f->id?>" ><?=$f->descripcion?></option>
							<?php endif; ?>
						<?php endforeach; ?>
					<?php else: ?>
						<option value="0" selected>Sin Padre</option>
						<?php foreach($parents as $f): ?>
								<option value="<?=$f->id?>" ><?=$f->descripcion?></option>
						<?php endforeach; ?>
					<?php endif; ?>
				</select>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="link"><?=$this->config->item('link')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$sismenu->link?>" name="link" id="link"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="created_at"><?=$this->config->item('created_at')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$sismenu->created_at?>" name="created_at" id="created_at" readonly="readonly"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="updated_at"><?=$this->config->item('updated_at')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$sismenu->updated_at?>" name="updated_at" id="updated_at" readonly="readonly"></input>
			</div>
		</div>

		<div class="form-actions">
	    	<a href="<?=base_url()?>sismenu_controller/index" class="btn" >Cancelar</a>
	    	<button type="submit" class="btn btn-primary" >Guardar</button>
	    </div>

	</form>
</div>
