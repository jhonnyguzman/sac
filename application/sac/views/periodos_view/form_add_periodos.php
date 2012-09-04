<?=$this->load->view('default/_header_admin')?>

<div class="span10">
	<div class="page-header">
	  <h1><?=$title_header?></h1>
	</div>
	<form action="<?=base_url()?>periodos_controller/add_c" method="post" name="formAddperiodos" id="formAddperiodos" class="stdform">
		<div class="control-group">
			<label class="control-label" for="fecha_inicio"><?=$this->config->item('fecha_inicio')?>:</label>
			<div class="controls">
				<input type="text" name="fecha_inicio" id="fecha_inicio"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="fecha_fin"><?=$this->config->item('fecha_fin')?>:</label>
			<div class="controls">
				<input type="text" name="fecha_fin" id="fecha_fin"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="costo_hora"><?=$this->config->item('costo_hora')?>:</label>
			<div class="controls">
				<input type="text" name="costo_hora" id="costo_hora"></input>
			</div>
		</div>
		
		<p class="stdformbutton">
	    	<a href="<?=base_url()?>periodos_controller/index" class="btn" >Cancelar</a>
	    	<button type="submit" class="submit radius2">Guardar</button>
	    </p>
	</form>

</div><!--/span10-->

<?=$this->load->view('default/_footer_admin')?>
