<?=$this->load->view('default/_header_admin')?>

<div class="span10">
	<div class="page-header">
	  <h1><?=$title_header?></h1>
	</div>
	<form action="<?=base_url()?>lineas_accion_controller/add_c" method="post" name="formAddlineas_accion" id="formAddlineas_accion" class="stdform">
		<div class="control-group">
			<label class="control-label" for="nombre"><?=$this->config->item('nombre')?>:</label>
			<input type="text" name="nombre" id="nombre"></input>
		</div>
		<div class="control-group">
			<label class="control-label" for="descripcion"><?=$this->config->item('descripcion')?>:</label>
			<input type="text" name="descripcion" id="descripcion"></input>
		</div>
		<div class="control-group">
			<label class="control-label" for="habilitado"><?=$this->config->item('habilitado')?>:</label>
			<span class="formwrapper">
				Si <input type='radio' name='habilitado' id='habilitado' value='1' />
            	No <input type='radio' name='habilitado' id='habilitado' value='0' checked='checked' />
			</span>
		<div class="control-group">
			<label class="control-label" for="ciclo"><?=$this->config->item('ciclo_descripcion')?>:</label>
			<span class="formwrapper">
				<?php foreach($ciclos as $f): ?>
					<?=$f->descripcion?><input type='radio' name='ciclo' id='ciclo' value='<?=$f->id?>' checked/>
	            <?php endforeach; ?>
			</span>
		</div>
		<p class="stdformbutton">
	    	<a href="<?=base_url()?>lineas_accion_controller/index" class="btn" >Cancelar</a>
	    	<button type="submit" class="submit radius2">Guardar</button>
	    </p>
	</form>
		
</div><!--/span10-->
<SCRIPT LANGUAGE='JavaScript'>
	var nombre = new LiveValidation('nombre'); nombre.add( Validate.Presence ); nombre.add( Validate.Length, { maximum: 15 } );
	var descripcion = new LiveValidation('descripcion'); descripcion.add( Validate.Length, { maximum: 45 } );
	var ciclo = new LiveValidation('ciclo'); ciclo.add( Validate.Presence ); 
</SCRIPT>
<?=$this->load->view('default/_footer_admin')?>
