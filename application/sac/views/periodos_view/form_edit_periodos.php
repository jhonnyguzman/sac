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
	<form action="<?=base_url()?>periodos_controller/edit_c/<?=$periodos->id?>" method="post" name="formEditperiodos" id="formEditperiodos" class="form-horizontal">
		<div class="control-group">
			<label class="control-label" for="id"><?=$this->config->item('id')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$periodos->id?>" name="id" id="id"  readonly="readonly"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="fecha_inicio"><?=$this->config->item('fecha_inicio')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$periodos->fecha_inicio?>" name="fecha_inicio" id="fecha_inicio" readonly="true"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="fecha_fin"><?=$this->config->item('fecha_fin')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$periodos->fecha_fin?>" name="fecha_fin" id="fecha_fin" readonly="true"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="costo_hora"><?=$this->config->item('costo_hora')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$periodos->costo_hora?>" name="costo_hora" id="costo_hora"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="estado"><?=$this->config->item('estado_descripcion')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$periodos->estado_descripcion?>" name="estado" id="estado" readonly="true"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="created_at"><?=$this->config->item('created_at')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$periodos->created_at?>" name="created_at" id="created_at" readonly="true"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="updated_at"><?=$this->config->item('updated_at')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$periodos->updated_at?>" name="updated_at" id="updated_at" readonly="true"></input>
			</div>
		</div>
		
		<div class="form-actions">
			<a href="<?=base_url()?>periodos_controller/index" class="btn" >Cancelar</a>
			<button type="submit" class="btn btn-primary">Modificar</button>
		</div>

	</form>

</div><!--/span10-->

<?=$this->load->view('default/_footer_admin')?>
