<?=$this->load->view('default/_header_admin')?>

<div class="span10">
	<div class="page-header">
	  <h1><?=$title_header?></h1>
	</div>
	<form action="<?=base_url()?>circuitos_controller/edit_c/<?=$circuitos->id?>" method="post" name="formEditcircuitos" id="formEditcircuitos" class="stdform">
		<input type="hidden" value="<?=$circuitos->id?>" name="id" id="id"/>
		<p>
			<label for="nombre"><?=$this->config->item('nombre')?></label>
		    <span class="field"><input type="text" value="<?=$circuitos->nombre?>" name="nombre" id="nombre"></input></span>
	    </p>
		<p>
        	<label for="habilitado"><?=$this->config->item('habilitado')?></label>
            <span class="formwrapper">
            	<input type="radio" name="habilitado" id='habilitado' value='1' <?php if ($circuitos->habilitado=="1") { echo "checked='checked'"; } ?> /> Habilitado &nbsp;&nbsp;
            	<input type="radio" name="habilitado" id='habilitado' value='0' <?php if ($circuitos->habilitado=="0") { echo "checked='checked'"; } ?> /> No Habilitado
            </span>
        </p>
		<p class="stdformbutton">
	    	<a href="<?=base_url()?>circuitos_controller/index" class="btn" >Cancelar</a>
	    	<button type="submit" class="submit radius2">Guardar</button>
	    </p>
	</form>

</div><!--/span10-->
<SCRIPT LANGUAGE='JavaScript'>
	var nombre = new LiveValidation('nombre'); nombre.add( Validate.Presence ); nombre.add( Validate.Length, { maximum: 10 } );
</SCRIPT>
<?=$this->load->view('default/_footer_admin')?>