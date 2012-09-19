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
	<form action="<?=base_url()?>lineas_accion_escuelas_controller/edit_c/<?=$lineas_accion_escuelas->id?>" 
		method="post" name="formEditlineas_accion_escuelas" id="formEditlineas_accion_escuelas" class="stdform">
		
		<input type="hidden" value="<?=$lineas_accion_escuelas->id?>" name="id" id="id" ></input>
		
		<div class="control-group">
			<label class="control-label" for="linea_periodo_escuela_id"><?=$this->config->item('linea_periodo_escuela_id')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$lineas_accion_escuelas->linea_periodo_escuela_id?>" name="linea_periodo_escuela_id" id="linea_periodo_escuela_id"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="linea_accion_id"><?=$this->config->item('linea_accion_id')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$lineas_accion_escuelas->linea_accion_id?>" name="linea_accion_id" id="linea_accion_id"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="created_at"><?=$this->config->item('created_at')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$lineas_accion_escuelas->created_at?>" name="created_at" id="created_at" readonly="readonly"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="updated_at"><?=$this->config->item('updated_at')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$lineas_accion_escuelas->updated_at?>" name="updated_at" id="updated_at" readonly="readonly"></input>
			</div>
		</div>
		
		<p class="stdformbutton">
	    	<a href="<?=base_url()?>lineas_accion_escuelas_controller/index" class="btn" >Cancelar</a>
	    	<button type="submit" class="submit radius2">Modificar</button>
	    </div>

		</form>

</div><!--/span10-->

<?=$this->load->view('default/_footer_admin')?>
