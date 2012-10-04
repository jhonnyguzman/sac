<?=$this->load->view('default/_header_admin')?>

<div class="span16">
	<div class="page-header">
	  <h3><?=$title_header?></h3>
	</div>
	<form action="<?=base_url()?>periodos_controller/edit_c/<?=$periodos->id?>" method="post" name="formEditperiodos" id="formEditperiodos" class="form-horizontal">
		<input type="hidden" value="<?=$periodos->id?>" name="id" id="id"/>
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
		
		<div class="form-actions">
	    	<a href="<?=base_url()?>periodos_controller/index" class="btn" >Cancelar</a>
	    	<button type="submit" class="btn btn-primary" >Guardar</button>
	    </div>
	</form>
</div><!--/span10-->

<?=$this->load->view('default/_footer_admin')?>
