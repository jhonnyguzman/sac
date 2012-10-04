<?=$this->load->view('default/_header_admin')?>

<div class="span16">
	<div class="page-header">
	  <h3><?=$title_header?></h3>
	</div>
	<form action="<?=base_url()?>departamentos_controller/add_c" method="post" name="formAdddepartamentos" id="formAdddepartamentos" class="form-horizontal">
		<p>
			<label for="nombre"><?=$this->config->item('nombre')?></label>
		    <span class="field"><input type="text" name="nombre" id="nombre"></input></span>
        </p>
		<p>
        	<label for="habilitado"><?=$this->config->item('habilitado')?></label>
            <span class="formwrapper">
            	<input type="radio" name="habilitado" id='habilitado' value='1' /> Habilitado &nbsp;&nbsp;
            	<input type="radio" name="habilitado" id='habilitado' value='0' checked='checked' /> No Habilitado
            </span>
        </p>
		<p>
			<label for="circuito_id"><?=$this->config->item('circuito_id')?></label>
		    <span class="field"><input type="text" name="circuito_id" id="circuito_id"></input></span>
        </p>
		<div class="form-actions">
	    	<a href="<?=base_url()?>departamentos_controller/index" class="btn" >Cancelar</a>
	    	<button type="submit" class="btn btn-primary" >Guardar</button>
	    </p>
	</form>
</div><!--/span10-->
<SCRIPT LANGUAGE='JavaScript'>
	var nombre = new LiveValidation('nombre'); nombre.add( Validate.Presence );
	var circuito_id = new LiveValidation('circuito_id'); circuito_id.add( Validate.Presence );
</SCRIPT>
<?=$this->load->view('default/_footer_admin')?>
