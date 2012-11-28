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
	<form action="<?=base_url()?>proyectos_controller/add_c" method="post" name="formAddproyectos" id="formAddproyectos" class="form-horizontal">
		<div class="control-group">
			<label class="control-label" for="nombre"><?=$this->config->item('nombre')?>:</label>
			<div class="controls">
				<input type="text" name="nombre" id="nombre"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="descripcion"><?=$this->config->item('descripcion')?>:</label>
			<div class="controls">
				<input type="text" name="descripcion" id="descripcion"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="habilitado"><?=$this->config->item('habilitado')?>:</label>
			<div class="controls">
				<select name="habilitado" id="habilitado">
            		<option value="1" selected>Habilitado</option>
            		<option value="0"> No habilitado</option>
            	</select>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="linea_id"><?=$this->config->item('linea_id')?>:</label>
			<div class="controls">
				<select name="linea_id" id="linea_id">
					<?php foreach($lineas as $f): ?>
						<option value="<?=$f->id?>"><?=$f->nombre?></option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>

		<div class="form-actions">
	    	<a href="<?=base_url()?>proyectos_controller/index" class="btn" >Cancelar</a>
	    	<button type="submit" class="btn btn-primary" >Guardar</button>
	    </div>
	</form>
</div><!--/span10-->


<?=$this->load->view('default/_footer_admin')?>
