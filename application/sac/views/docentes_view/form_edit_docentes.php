<?=$this->load->view('default/_header_admin')?>

<div class="span16">
	<div class="page-header">
	  <h3><?=$title_header?></h3>
	</div>
	<form action="<?=base_url()?>docentes_controller/edit_c/<?=$docentes->id?>" method="post" name="formEditdocentes" id="formEditdocentes" class="form-horizontal">
		<input type="hidden" value="<?=$docentes->id?>" name="id" id="id"/>
		<div class="control-group">
			<label class="control-label" for="dni"></span><?=$this->config->item('dni')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$docentes->dni?>" name="dni" id="dni"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="apellido"><?=$this->config->item('apellido')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$docentes->apellido?>" name="apellido" id="apellido"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="nombre"><?=$this->config->item('nombre')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$docentes->nombre?>" name="nombre" id="nombre"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="telefono"><?=$this->config->item('telefono')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$docentes->telefono?>" name="telefono" id="telefono"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="email"><?=$this->config->item('email')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$docentes->email?>" name="email" id="email"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="titulo"><?=$this->config->item('titulo')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$docentes->titulo_id?>" name="titulo" id="titulo"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="habilitado"><?=$this->config->item('habilitado')?>:</label>
			<div class="controls">
				Si <input type='radio' name='habilitado' id='habilitado' value='1' <?php if ($docentes->habilitado=="1") { echo "checked='checked'"; } ?> />
            	No <input type='radio' name='habilitado' id='habilitado' value='0' <?php if ($docentes->habilitado=="0") { echo "checked='checked'"; } ?> />
			</div>
		</div>
		
		<div class="form-actions">
	    	<a href="<?=base_url()?>docentes_controller/index" class="btn" >Cancelar</a>
	    	<button type="submit" class="btn btn-primary" >Guardar</button>
	    </div>
	</form>
</div><!--/span10-->

<?=$this->load->view('default/_footer_admin')?>
