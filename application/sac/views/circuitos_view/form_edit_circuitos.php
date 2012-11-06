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
	<form action="<?=base_url()?>circuitos_controller/edit_c/<?=$circuitos->id?>" method="post" 
		name="formEditcircuitos" id="formEditcircuitos" class="form-horizontal">
		
		<input type="hidden" value="<?=$circuitos->id?>" name="id" id="id"/>
		
		<div class="control-group">
			<label class="control-label" for="nombre"><?=$this->config->item('nombre')?></label>
			<div class="controls">
		    	<input type="text" value="<?=$circuitos->nombre?>" name="nombre" id="nombre"></input>
		    </div>
	    </div>
		<div class="control-group">
        	<label class="control-label" for="habilitado">Estado</label>
            <div class="controls">
            	<select name="habilitado" id='habilitado'>
            		<option value="1" <?php if ($circuitos->habilitado=="1") { echo "selected"; } ?>>Habilitado</option>
            		<option value="0" <?php if ($circuitos->habilitado=="0") { echo "selected"; } ?>>No Habilitado</option>
            	</select>
            </div>
        </div>
		<div class="form-actions">
	    	<a href="<?=base_url()?>circuitos_controller/index" class="btn" >Cancelar</a>
	    	<button type="submit" class="btn btn-primary" >Guardar</button>
	    </div>
	</form>

</div><!--/span10-->

<?=$this->load->view('default/_footer_admin')?>