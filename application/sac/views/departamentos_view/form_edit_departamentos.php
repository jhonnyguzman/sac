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
	<form action="<?=base_url()?>departamentos_controller/edit_c/<?=$departamentos->id?>" method="post" name="formEditdepartamentos" id="formEditdepartamentos" class="form-horizontal">
		
		<input type="hidden" value="<?=$departamentos->id?>" name="id" id="id"/>
		
		<div class="control-group">
			<label class="control-label" for="nombre"><?=$this->config->item('nombre')?></label>
			<div class="controls">
		    	<input type="text" value="<?=$departamentos->nombre?>" name="nombre" id="nombre"></input>
		    </div>
	    </div>
		<div class="control-group">
        	<label class="control-label" for="habilitado">Estado</label>
            <div class="controls">
            	<select name="habilitado" id='habilitado'>
            		<option value="1" <?php if ($departamentos->habilitado=="1") { echo "selected"; } ?>>Habilitado</option>
            		<option value="0" <?php if ($departamentos->habilitado=="0") { echo "selected"; } ?>>No Habilitado</option>
            	</select>
            </div>
        </div>
		<div class="control-group">
			<label class="control-label" for="circuito_id"><?=$this->config->item('circuito_nombre')?></label>
			<div class="controls">
		    	<select name="circuito_id" id="circuito_id">
					<?php foreach($circuitos as $f): ?>
						<?php if($f->id == $departamentos->circuito_id): ?>
							<option value="<?=$f->id?>" selected><?=$f->nombre?></option>
						<?php else: ?>
							<option value="<?=$f->id?>" ><?=$f->nombre?></option>
						<?php endif; ?>
					<?php endforeach; ?>
				</select>
		    </div>
	    </div>		
		<div class="form-actions">
	    	<a href="<?=base_url()?>departamentos_controller/index" class="btn" >Cancelar</a>
	    	<button type="submit" class="btn btn-primary" >Guardar</button>
	    </div>
	</form>

</div><!--/span10-->
<SCRIPT LANGUAGE='JavaScript'>
	var nombre = new LiveValidation('nombre'); nombre.add( Validate.Presence ); nombre.add( Validate.Length, { maximum: 16 } );
	var circuito_id = new LiveValidation('circuito_id'); circuito_id.add( Validate.Presence );
</SCRIPT>
<?=$this->load->view('default/_footer_admin')?>
