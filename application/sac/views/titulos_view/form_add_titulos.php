<?=$this->load->view('default/_header_admin')?>

<div class="span10">
	<div class="page-header">
	  <h1><?=$title_header?></h1>
	</div>
<form action="<?=base_url()?>titulos_controller/add_c" method="post" name="formAddtitulos" id="formAddtitulos" class="stdform">
	<div class="control-group">
		<label class="control-label" for="nombre"><?=$this->config->item('nombre')?>:</label>
		<input type="text" name="nombre" id="nombre"></input>
	</div>
	<div class="control-group">
		<label class="control-label" for="tipo"><?=$this->config->item('tipo')?>:</label>
		<select name="tipo">
			<?php foreach($tipos as $f): ?>
				<option value="<?=$f->id?>"><?=$f->descripcion?></option>
			<?php endforeach;?>
		</select>
	</div>
	<p class="stdformbutton">
    	<a href="<?=base_url()?>titulos_controller/index" class="btn" >Cancelar</a>
    	<button type="submit" class="submit radius2">Guardar</button>
    </p>
</form>

</div><!--/span10-->
<SCRIPT LANGUAGE='JavaScript'>
	var nombre = new LiveValidation('nombre'); nombre.add( Validate.Presence ); nombre.add( Validate.Length, { maximum: 70 } );
</SCRIPT>
<?=$this->load->view('default/_footer_admin')?>
