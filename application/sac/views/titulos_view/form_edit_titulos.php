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
	<form action="<?=base_url()?>titulos_controller/edit_c/<?=$titulos->id?>" method="post" name="formEdittitulos" id="formEdittitulos" class="form-horizontal">
	
	<input type="hidden" value="<?=$titulos->id?>" name="id" id="id"/>
	
	<div class="control-group">
		<label class="control-label" for="nombre"><?=$this->config->item('nombre')?>:</label>
		<div class="controls">
			<input type="text" value="<?=$titulos->nombre?>" name="nombre" id="nombre"></input>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="tipo"><?=$this->config->item('tipo')?>:</label>
		<div class="controls">
			<select name="tipo" id="tipo" >
				<?php foreach ($tipos as $f): ?>
					<?php if($f->id == $titulos->tipo): ?>
						<option value="<?=$f->id?>" selected ><?=$f->descripcion?></option>
					<?php else: ?>
						<option value="<?=$f->id?>"><?=$f->descripcion?></option>
					<?php endif; ?>
				<?php endforeach; ?>
			</select>
		</div>	
	</div>
	<div class="form-actions">
	    	<a href="<?=base_url()?>titulos_controller/index" class="btn" >Cancelar</a>
	    	<button type="submit" class="btn btn-primary" >Guardar</button>
	</div>

</div><!--/span10-->

<?=$this->load->view('default/_footer_admin')?>