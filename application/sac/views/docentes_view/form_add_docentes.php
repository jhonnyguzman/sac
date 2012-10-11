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
	<form action="<?=base_url()?>docentes_controller/add_c" method="post" name="formAdddocentes" id="formAdddocentes" class="form-horizontal">
		<div class="control-group">
			<label class="control-label" for="dni"><?=$this->config->item('dni')?>:</label>
			<div class="controls">
				<input type="text" name="dni" id="dni" value="<?php echo set_value('dni'); ?>"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="apellido"><?=$this->config->item('apellido')?>:</label>
			<div class="controls">
				<input type="text" name="apellido" id="apellido" value="<?php echo set_value('apellido'); ?>"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="nombre"><?=$this->config->item('nombre')?>:</label>
			<div class="controls">
				<input type="text" name="nombre" id="nombre" value="<?php echo set_value('nombre'); ?>"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="telefono"><?=$this->config->item('telefono')?>:</label>
			<div class="controls">
				<input type="text" name="telefono" id="telefono" value="<?php echo set_value('telefono'); ?>"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="email"><?=$this->config->item('email')?>:</label>
			<div class="controls">
				<input type="text" name="email" id="email" value="<?php echo set_value('email'); ?>"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="titulo"><?=$this->config->item('titulo')?>:</label>
			<div class="controls">
				<select name="titulo_id[]" id="titulo_id" data-placeholder="Seleccione titulos" class="chzn-select" multiple>
					<?php foreach($titulos as $f): ?>
						<option value="<?=$f->id?>" <?=set_select('titulo_id',$f->id)?>  ><?=$f->nombre?></option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="habilitado"><?=$this->config->item('habilitado')?>:</label>
			<div class="controls">
				Si <input type='radio' name='habilitado' id='habilitado' value='1' checked/>
            	No <input type='radio' name='habilitado' id='habilitado' value='0' />
			</div>
		</div>
	
		<div class="form-actions">
	    	<a href="<?=base_url()?>docentes_controller/index" class="btn" >Cancelar</a>
	    	<button type="submit" class="btn btn-primary" >Guardar</button>
	    </div>

	</form>

</div><!--/span19-->

<script type="text/javascript">
	$(document).ready(function(){ 
		$(".chzn-select").chosen();
	});
</script>

<?=$this->load->view('default/_footer_admin')?>
