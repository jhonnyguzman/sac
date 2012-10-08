<?=$this->load->view('default/_header_admin')?>

<div class="span28">
	<div class="page-header">
	  <h3><?=$title_header?></h3>
	</div>
	<form action="<?=base_url()?>localidades_controller/edit_c/<?=$localidades->id?>" method="post" name="formEditlocalidades" id="formEditlocalidades" class="form-horizontal">
		<input type="hidden" value="<?=$localidades->id?>" name="id" id="id"/>
		<p>
	    	<label for="nombre"><?=$this->config->item('nombre')?></label>
	        <span class="field"><input type="text" name="nombre" id="nombre" value="<?=$localidades->nombre?>"></input></span>
	    </p>
	    <p>
	    	<label for="habilitado"><?=$this->config->item('habilitado')?></label>
	        <span class="formwrapper">
	        	<input type="radio" name="habilitado" id='habilitado' value='1' <?php if ($localidades->habilitado=="1") { echo "checked='checked'"; } ?> /> Habilitado &nbsp;&nbsp;
	        	<input type="radio" name="habilitado" id='habilitado' value='0' <?php if ($localidades->habilitado=="0") { echo "checked='checked'"; } ?> /> No Habilitado
	        </span>
	    </p>
		<p>
	    	<label for="departamento_id"><?=$this->config->item('departamento_id')?></label>
			<span class="field"><input type="text" value="<?=$localidades->departamento_id?>" name="departamento_id" id="departamento_id"></input></span>
		</p>
		<div class="form-actions">
	    	<a href="<?=base_url()?>localidades_controller/index" class="btn" >Cancelar</a>
	    	<button type="submit" class="btn btn-primary" >Guardar</button>
	    </div>
	</form>
</div><!--/span10-->
<SCRIPT LANGUAGE='JavaScript'>
	var nombre = new LiveValidation('nombre'); nombre.add( Validate.Presence ); nombre.add( Validate.Length, { maximum: 16 } );
	var departamento_id = new LiveValidation('departamento_id'); departamento_id.add( Validate.Presence );
</SCRIPT>
<?=$this->load->view('default/_footer_admin')?>