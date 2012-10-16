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
	        	<input type="radio" name="habilitado" id='habilitado' value='1' <?php if ($localidades->habilitado=="1") { echo "checked='checked'"; } ?> /> Habilitado &nbsp;&nbsp;
	        	<input type="radio" name="habilitado" id='habilitado' value='0' <?php if ($localidades->habilitado=="0") { echo "checked='checked'"; } ?> /> No Habilitado
	        </div>
	    </div>
		<div class="control-group">
	    	<label class="control-label" for="departamento_id"><?=$this->config->item('departamento_id')?></label>
	    	<div class="controls">
				<span class="field"><input type="text" value="<?=$localidades->departamento_id?>" name="departamento_id" id="departamento_id"></input></span>
			</div>
		</div>
		<div class="form-actions">
	    	<a href="<?=base_url()?>localidades_controller/index" class="btn" >Cancelar</a>
	    	<button type="submit" class="btn btn-primary" >Guardar</button>
	    </div>
	</form>
</div><!--/span28-->

<?=$this->load->view('default/_footer_admin')?>