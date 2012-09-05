<?=$this->load->view('default/_header_admin')?>

<div class="span10">
	<div class="page-header">
	  <h1><?=$title_header?></h1>
	</div>
	<form action="<?=base_url()?>directores_controller/edit_c/<?=$directores->id?>" method="post" name="formEditdirectores" id="formEditdirectores" class="stdform">
		<input type="hidden" value="<?=$directores->id?>" name="id" id="id"/>
		<p>
			<label for="dni"><?=$this->config->item('dni')?></label>
		    <span class="field"><input type="text" value="<?=$directores->dni?>" name="dni" id="dni"></input></span>
        </p>
		<p>
			<label for="apellido"><?=$this->config->item('apellido')?></label>
		    <span class="field"><input type="text" value="<?=$directores->apellido?>" name="apellido" id="apellido"></input></span>
        </p>
			<label for="nombre"><?=$this->config->item('nombre')?></label>
		    <span class="field"><input type="text" value="<?=$directores->nombre?>" name="nombre" id="nombre"></input></span>
        </p>
		<p>
			<label for="telefono"><?=$this->config->item('telefono')?></label>
		    <span class="field"><input type="text" value="<?=$directores->telefono?>" name="telefono" id="telefono"></input></span>
        </p>
		<p>
			<label for="email"><?=$this->config->item('email')?></label>
		    <span class="field"><input type="text" value="<?=$directores->email?>" name="email" id="email"></input></span>
        </p>
		<p>
        	<label for="habilitado"><?=$this->config->item('habilitado')?></label>
            <span class="formwrapper">
            	<input type="radio" name="habilitado" id='habilitado' value='1' <?php if ($directores->habilitado=="1") { echo "checked='checked'"; } ?> /> Habilitado &nbsp;&nbsp;
            	<input type="radio" name="habilitado" id='habilitado' value='0' <?php if ($directores->habilitado=="0") { echo "checked='checked'"; } ?> /> No Habilitado
            </span>
        </p>
		<p class="stdformbutton">
	    	<a href="<?=base_url()?>directores_controller/index" class="btn" >Cancelar</a>
	    	<button type="submit" class="submit radius2">Guardar</button>
	    </p>
	</form>
</div><!--/span10-->
<SCRIPT LANGUAGE='JavaScript'>
	var dni = new LiveValidation('dni'); dni.add( Validate.Presence ); dni.add( Validate.Numericality ); dni.add( Validate.Length, { is: 8 } );
	var apellido = new LiveValidation('apellido'); apellido.add( Validate.Presence );
	var nombre = new LiveValidation('nombre'); nombre.add( Validate.Presence );
	var telefono = new LiveValidation('telefono'); telefono.add( Validate.Numericality );
	var email = new LiveValidation('email'); email.add( Validate.Email );
</SCRIPT>
<?=$this->load->view('default/_footer_admin')?>

