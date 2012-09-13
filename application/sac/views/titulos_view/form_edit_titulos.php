<?=$this->load->view('default/_header_admin')?>

<div class="span10">
	<div class="page-header">
	  <h1><?=$title_header?></h1>
	</div>
<form action="<?=base_url()?>titulos_controller/edit_c/<?=$titulos->id?>" method="post" name="formEdittitulos" id="formEdittitulos" class="stdform">
	<input type="hidden" value="<?=$titulos->id?>" name="id" id="id"/>
	<div class="control-group">
		<label class="control-label" for="nombre"><?=$this->config->item('nombre')?>:</label>
		<input type="text" value="<?=$titulos->nombre?>" name="nombre" id="nombre"></input>
	</div>
	<div class="control-group">
		<label class="control-label" for="tipo"><?=$this->config->item('tipo')?>:</label>
		<select name="tipo" id="tipo" >
			<?php foreach ($tipos as $f): ?>
				<?php if($f->id == $titulos->tipo): ?>
					<option value="<?=$f->id?>" selected ><?=$f->descripcion?></option>
				<?php else: ?>
					<option value="<?=$f->id?>"><?=$f->descripcion?></option>
				<?php endif; ?>
			<?php endforeach; ?>
		</select>	
	</div>
	<p class="stdformbutton">
	    	<a href="<?=base_url()?>titulos_controller/index" class="btn" >Cancelar</a>
	    	<button type="submit" class="submit radius2">Guardar</button>
	    </div>

</div><!--/span10-->
<SCRIPT LANGUAGE='JavaScript'>
	var nombre = new LiveValidation('nombre'); nombre.add( Validate.Presence ); nombre.add( Validate.Length, { maximum: 70 } );
</SCRIPT>
<?=$this->load->view('default/_footer_admin')?>