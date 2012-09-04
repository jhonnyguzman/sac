<?=$this->load->view('default/_header_admin')?>

<div class="span10">
	<div class="page-header">
	  <h1><?=$title_header?></h1>
	</div>
	<form action="<?=base_url()?>directores_controller/add_c" method="post" name="formAdddirectores" id="formAdddirectores" class="stdform">
		<div class="control-group">
			<label class="control-label" for="dni"><?=$this->config->item('dni')?>:</label>
			<input type="text" name="dni" id="dni"></input>
		</div>
		<div class="control-group">
			<label class="control-label" for="apellido"></span><?=$this->config->item('apellido')?>:</label>
			<input type="text" name="apellido" id="apellido"></input>
		</div>
		<div class="control-group">
			<label class="control-label" for="nombre"><?=$this->config->item('nombre')?>:</label>
			<input type="text" name="nombre" id="nombre"></input>
		</div>
		<div class="control-group">
			<label class="control-label" for="telefono"><?=$this->config->item('telefono')?>:</label>
			<input type="text" name="telefono" id="telefono"></input>
		</div>
		<div class="control-group">
			<label class="control-label" for="email"><?=$this->config->item('email')?>:</label>
			<input type="text" name="email" id="email"></input>
		</div>
		<p>
        	<label for="habilitado"><?=$this->config->item('habilitado')?></label>
            <span class="formwrapper">
            	<input type="radio" name="habilitado" id='habilitado' value='1' /> Habilitado &nbsp;&nbsp;
            	<input type="radio" name="habilitado" id='habilitado' value='0' checked='checked' /> No Habilitado
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
	var apellido = new LiveValidation('apellido'); apellido.add( Validate.Presence ); apellido.add( Validate.Length, { maximum: 10 } );
	var nombre = new LiveValidation('nombre'); nombre.add( Validate.Presence ); nombre.add( Validate.Length, { maximum: 15 } );
	var telefono = new LiveValidation('telefono'); telefono.add( Validate.Numericality ); telefono.add( Validate.Length, { maximum: 15 } );
	var email = new LiveValidation('email'); email.add( Validate.Email ); email.add( Validate.Length, { maximum: 45 } );
</SCRIPT>
<?=$this->load->view('default/_footer_admin')?>
