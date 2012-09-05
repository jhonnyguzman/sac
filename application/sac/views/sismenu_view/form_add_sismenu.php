<?=$this->load->view('default/_header_admin')?>

<div class="span10">
	<div class="page-header">
	  <h1><?=$title_header?></h1>
	</div>

	<?php if(validation_errors() || isset($error)): ?>
		<div class="alert alert-error">
			<a class="close" data-dismiss="alert" href="#">×</a>
			<?=validation_errors()?>
			
		</div>		
	<?php endif; ?>
	<form action="<?=base_url()?>index.php/sismenu_controller/add_c" method="post" name="formAddsismenu" id="formAddsismenu" class="stdform">
		<div class="control-group">
			<label class="control-label" for="descripcion"><?=$this->config->item('descripcion')?>:</label>
			<div class="controls">
				<input type="text" name="descripcion" id="descripcion"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="estado"><?=$this->config->item('estado')?>:</label>
			<div class="controls">
				<span class="formwrapper">
					<?php foreach($estados as $f): ?>
						<?=$f->descripcion?><input type="radio" name="estado" value="<?=$f->id?>" checked>
					<?php endforeach; ?>
				</span>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="parent"><?=$this->config->item('parent')?>:</label>
			<div class="controls">
				<select  name="parent" id="parent">
					<option value="0" selected>Sin Padre</option>
					<?php foreach($parents as $f): ?>
						<option value="<?=$f->id?>"><?=$f->descripcion?></option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="link"><?=$this->config->item('link')?>:</label>
			<div class="controls">
				<input type="text" name="link" id="link"></input>
			</div>
		</div>
		
		<p class="stdformbutton">
	    	<a href="<?=base_url()?>sismenu_controller/index" class="btn" >Cancelar</a>
	    	<button type="submit" class="submit radius2">Guardar</button>
	    </p>

	</form>

</div><!--/span10-->

<?=$this->load->view('default/_footer_admin')?>
