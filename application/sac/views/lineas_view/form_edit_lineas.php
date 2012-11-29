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
	<form action="<?=base_url()?>lineas_controller/edit_c/<?=$lineas->id?>" method="post" name="formEditlineas" id="formEditlineas"  class="form-horizontal">
		
		<input type="hidden" value="<?=$lineas->id?>" name="id" id="id"  readonly="readonly"></input>
		
		<div class="control-group">
			<label class="control-label" for="nombre"><?=$this->config->item('nombre')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$lineas->nombre?>" name="nombre" id="nombre"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="descripcion"><?=$this->config->item('descripcion')?>:</label>
			<div class="controls">
				<textarea name="descripcion" id="descripcion"><?=$lineas->descripcion?></textarea>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="habilitado"><?=$this->config->item('habilitado')?>:</label>
			<div class="controls">
				<select name="habilitado" id='habilitado'>
            		<option value="1" <?php if ($lineas->habilitado=="1") { echo "selected"; } ?>>Habilitado</option>
            		<option value="0" <?php if ($lineas->habilitado=="0") { echo "selected"; } ?>>No Habilitado</option>
            	</select>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="eje_id"><?=$this->config->item('eje_id')?>:</label>
			<div class="controls">
				<select name="eje_id" id="eje_id">
					<?php foreach($ejes as $f): ?>
						<?php if($f->id == $lineas->eje_id): ?>
							<option value="<?=$f->id?>" selected><?=$f->nombre?></option>
						<?php else: ?>
							<option value="<?=$f->id?>"><?=$f->nombre?></option>
						<?php endif; ?>
					<?php endforeach; ?>
				</select>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="created_at"><?=$this->config->item('created_at')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$lineas->created_at?>" name="created_at" id="created_at" readonly></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="updated_at"><?=$this->config->item('updated_at')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$lineas->updated_at?>" name="updated_at" id="updated_at" readonly></input>
			</div>
		</div>

		<div class="form-actions">
	    	<a href="<?=base_url()?>lineas_controller/index" class="btn" >Cancelar</a>
	    	<button type="submit" class="btn btn-primary" >Guardar</button>
	    </div>
	</form>
</div><!--/span10-->


<?=$this->load->view('default/_footer_admin')?>