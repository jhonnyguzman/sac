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
	<form action="<?=base_url()?>horas_institucionales_controller/edit_c/<?=$horas_institucionales->id?>" 
		method="post" name="formEdithoras_institucionales" id="formEdithoras_institucionales" class="stdform">
		
		<input type="hidden" value="<?=$horas_institucionales->id?>" name="id" id="id"></input>
		
		<div class="control-group">
			<label class="control-label" for="linea_accion_docente_id"><?=$this->config->item('linea_accion_docente_id')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$horas_institucionales->linea_accion_docente_id?>" name="linea_accion_docente_id" id="linea_accion_docente_id"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="cantidad_horas"><?=$this->config->item('cantidad_horas')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$horas_institucionales->cantidad_horas?>" name="cantidad_horas" id="cantidad_horas"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="linea_periodo_escuela_id"><?=$this->config->item('linea_periodo_escuela_id')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$horas_institucionales->linea_periodo_escuela_id?>" name="linea_periodo_escuela_id" id="linea_periodo_escuela_id"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="created_at"><?=$this->config->item('created_at')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$horas_institucionales->created_at?>" name="created_at" id="created_at" readonly="readonly"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="updated_at"><?=$this->config->item('updated_at')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$horas_institucionales->updated_at?>" name="updated_at" id="updated_at" readonly="readonly"></input>
			</div>
		</div>


		<p class="stdformbutton">
	    	<a href="<?=base_url()?>horas_institucionales_controller/index" class="btn" >Cancelar</a>
	    	<button type="submit" class="submit radius2">Guardar</button>
	    </div>

		</form>

</div><!--/span10-->

<?=$this->load->view('default/_footer_admin')?>