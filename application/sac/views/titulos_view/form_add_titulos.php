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
	<form action="<?=base_url()?>titulos_controller/add_c" method="post" name="formAddtitulos" id="formAddtitulos" class="form-horizontal">
	<div class="control-group">
		<label class="control-label" for="nombre"><?=$this->config->item('nombre')?>:</label>
		<div class="controls">
			<input type="text" name="nombre" id="nombre"></input>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="tipo"><?=$this->config->item('tipo')?>:</label>
		<div class="controls">
			<select name="tipo">
				<?php foreach($tipos as $f): ?>
					<option value="<?=$f->id?>"><?=$f->descripcion?></option>
				<?php endforeach;?>
			</select>
		</div>
	</div>
	<div class="form-actions">
    	<a href="<?=base_url()?>titulos_controller/index" class="btn" >Cancelar</a>
    	<button type="submit" class="btn btn-primary" >Guardar</button>
    </div>
</form>

</div><!--/span10-->

<?=$this->load->view('default/_footer_admin')?>
