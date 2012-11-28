<?=$this->load->view('default/_header_admin')?>

<div class="span28">
	<div class="page-header">
	  <h3><?=$title_header?></h3>
	</div>
	<form action="<?=base_url()?>localidades_controller/edit_c/<?=$localidades->id?>" method="post" name="formEditlocalidades" id="formEditlocalidades" 
		class="form-horizontal">
		
		<input type="hidden" value="<?=$localidades->id?>" name="id" id="id"/>
		
		<div class="control-group">
	    	<label class="control-label" for="nombre"><?=$this->config->item('nombre')?></label>
	    	<div class="controls">
	        	<span class="field"><input type="text" name="nombre" id="nombre" value="<?=$localidades->nombre?>"></input></span>
	        </div>
	    </div>
	    <div class="control-group">
	    	<label class="control-label" for="habilitado">Estado</label>
	         <div class="controls">
	        	<select name="habilitado" id='habilitado'>
            		<option value="1" <?php if ($localidades->habilitado=="1") { echo "selected"; } ?>>Habilitado</option>
            		<option value="0" <?php if ($localidades->habilitado=="0") { echo "selected"; } ?>>No Habilitado</option>
            	</select>
	        </div>
	    </div>
		<div class="control-group">
	    	<label class="control-label" for="departamento_id"><?=$this->config->item('departamento_nombre')?></label>
	    	<div class="controls">
				<select name="departamento_id" id="departamento_id">
					<?php foreach($departamentos as $f): ?>
						<?php if($f->id == $localidades->departamento_id): ?>
							<option value="<?=$f->id?>" selected><?=$f->nombre?></option>
						<?php else: ?>
							<option value="<?=$f->id?>" ><?=$f->nombre?></option>
						<?php endif; ?>
					<?php endforeach; ?>
				</select>
			</div>
		</div>
		<div class="form-actions">
	    	<a href="<?=base_url()?>localidades_controller/index" class="btn" >Cancelar</a>
	    	<button type="submit" class="btn btn-primary" >Guardar</button>
	    </div>
	</form>
</div><!--/span28-->

<?=$this->load->view('default/_footer_admin')?>