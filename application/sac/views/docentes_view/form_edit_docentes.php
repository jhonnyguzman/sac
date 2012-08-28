<script> setDatePicker(new Array('created_at'));</script>
<div id="title-level2"><?=$subtitle?></div>
<div id="form">
<div class="fields-required">Campos obligatorios (*)</div>
<form action="<?=base_url()?>docentes_controller/edit_c/<?=$docentes->id?>" method="post" name="formEditdocentes" id="formEditdocentes">
	<p>
		<label><span class='required'>*</span><?=$this->config->item('id')?>:</label>
		<input type="text" value="<?=$docentes->id?>" name="id" id="id"  readonly="readonly"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('dni')?>:</label>
		<input type="text" value="<?=$docentes->dni?>" name="dni" id="dni"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('apellido')?>:</label>
		<input type="text" value="<?=$docentes->apellido?>" name="apellido" id="apellido"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('nombre')?>:</label>
		<input type="text" value="<?=$docentes->nombre?>" name="nombre" id="nombre"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('telefono')?>:</label>
		<input type="text" value="<?=$docentes->telefono?>" name="telefono" id="telefono"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('email')?>:</label>
		<input type="text" value="<?=$docentes->email?>" name="email" id="email"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('titulo')?>:</label>
		<input type="text" value="<?=$docentes->titulo?>" name="titulo" id="titulo"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('habilitado')?>:</label>
		<input type="text" value="<?=$docentes->habilitado?>" name="habilitado" id="habilitado"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('created_at')?>:</label>
		<input type="text" value="<?=$docentes->created_at?>" name="created_at" id="created_at"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('updated_at')?>:</label>
		<input type="text" value="<?=$docentes->updated_at?>" name="updated_at" id="updated_at"></input>
	</p>
	<div class="botonera">
		<input type="submit" name="modificar" value="Modificar" class="crudtest-button" id="btn-save" onClick="submitData('formEditdocentes',new Array('right-content','right-content'))"></input>
		<input type="button" name="cancelar" value="Cancelar" class="crudtest-button" id="btn-cancel" onClick="loadPage('<?=base_url()?>docentes_controller/index','right-content')"></input>
	</div>
	<div class="errors" id="errors">
	<?php
		echo validation_errors();
		if(isset($error)) echo $error;
	?>
	</div>
	<div id="busy"><img src="<?=base_url()?>css/images/ajax-loader.gif" /></div></form>
</div>
