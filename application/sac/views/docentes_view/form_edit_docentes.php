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
	<form action="<?=base_url()?>docentes_controller/edit_c/<?=$docentes->id?>" method="post" name="formEditdocentes" id="formEditdocentes" class="form-horizontal">
		<input type="hidden" value="<?=$docentes->id?>" name="id" id="id"/>
		<div class="control-group">
			<label class="control-label" for="dni"></span><?=$this->config->item('dni')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$docentes->dni?>" name="dni" id="dni" readonly></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="apellido"><?=$this->config->item('apellido')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$docentes->apellido?>" name="apellido" id="apellido"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="nombre"><?=$this->config->item('nombre')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$docentes->nombre?>" name="nombre" id="nombre"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="telefono"><?=$this->config->item('telefono')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$docentes->telefono?>" name="telefono" id="telefono"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="email"><?=$this->config->item('email')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$docentes->email?>" name="email" id="email"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="titulo"><?=$this->config->item('titulo')?>:</label>
			<div class="controls">
				<select name="titulo_id[]" id="titulo_id" data-placeholder="Seleccione titulos" class="chzn-select" multiple>
					<?php foreach($titulos_asignados as $g): ?>
						<option value="<?=$g->titulo_id?>" selected><?=$g->titulo_nombre?></option>
					<?php endforeach;?>
					<?php foreach($titulos_sin_asignar as $f): ?>
						<option value="<?=$f->id?>" ><?=$f->nombre?></option>	
					<?php endforeach;?>
				</select>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="habilitado">Estado:</label>
			<div class="controls">
				Habilitado <input type='radio' name='habilitado' id='habilitado' value='1' <?php if ($docentes->habilitado=="1") { echo "checked='checked'"; } ?> />
            	No Habilitado <input type='radio' name='habilitado' id='habilitado' value='0' <?php if ($docentes->habilitado=="0") { echo "checked='checked'"; } ?> />
			</div>
		</div>
		
		<div class="form-actions">
	    	<a href="<?=base_url()?>docentes_controller/index" class="btn" >Cancelar</a>
	    	<button type="submit" class="btn btn-primary" >Guardar</button>
	    </div>
	</form>
</div><!--/span10-->

<script type="text/javascript">
	$(document).ready(function(){ 
		$(".chzn-select").chosen();
	});
</script>

<?=$this->load->view('default/_footer_admin')?>
