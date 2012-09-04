<?=$this->load->view('default/_header_admin')?>

<div class="span10">
	<div class="page-header">
	  <h1><?=$title_header?></h1>
	</div>
	<form action="<?=base_url()?>departamentos_controller/edit_c/<?=$departamentos->id?>" method="post" name="formEditdepartamentos" id="formEditdepartamentos" class="stdform">
		<p>
			<label for="nombre"><?=$this->config->item('nombre')?></label>
		    <span class="field"><input type="text" value="<?=$departamentos->nombre?>" name="nombre" id="nombre"></input></span>
	    </p>
		<p>
        	<label for="habilitado"><?=$this->config->item('habilitado')?></label>
            <span class="formwrapper">
            	<input type="radio" name="habilitado" id='habilitado' value='1' <?php if ($departamentos->habilitado=="1") { echo "checked='checked'"; } ?> /> Habilitado &nbsp;&nbsp;
            	<input type="radio" name="habilitado" id='habilitado' value='0' <?php if ($departamentos->habilitado=="0") { echo "checked='checked'"; } ?> /> No Habilitado
            </span>
        </p>
		<p>
			<label for="circuito_id"><?=$this->config->item('circuito_id')?></label>
		    <span class="field"><input type="text" value="<?=$departamentos->circuito_id?>" name="circuito_id" id="circuito_id"></input></span>
	    </p>		
		<p class="stdformbutton">
	    	<a href="<?=base_url()?>departamentos_controller/index" class="btn" >Cancelar</a>
	    	<button type="submit" class="submit radius2">Guardar</button>
	    </p>
	</form>

</div><!--/span10-->
<SCRIPT LANGUAGE='JavaScript'>
	var nombre = new LiveValidation('nombre'); nombre.add( Validate.Presence ); nombre.add( Validate.Length, { maximum: 16 } );
	var circuito_id = new LiveValidation('circuito_id'); circuito_id.add( Validate.Presence );
</SCRIPT>
<?=$this->load->view('default/_footer_admin')?>
