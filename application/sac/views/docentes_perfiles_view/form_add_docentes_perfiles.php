<?=$this->load->view('default/_header_admin')?>

<div class="span10">
	<div class="page-header">
	  <h1><?=$title_header?></h1>
	</div>
	<form action="<?=base_url()?>docentes_perfiles_controller/add_c" method="post" name="formAdddocentes_perfiles" id="formAdddocentes_perfiles" class="stdform">
		<div class="control-group">
				<label class="control-label" for="docente_id"><?=$this->config->item('docente_id')?>:</label>
			<input type="text" name="docente_id" id="docente_id"></input>
		</div>
		<div class="control-group">
				<label class="control-label" for="perfil_id"><?=$this->config->item('perfil_id')?>:</label>
			<input type="text" name="perfil_id" id="perfil_id"></input>
		</div>
		<p class="stdformbutton">
	    	<a href="<?=base_url()?>docentes_perfiles_controller/index" class="btn" >Cancelar</a>
	    	<button type="submit" class="submit radius2">Guardar</button>
	    </p>
	</form>
</div><!--/span10-->

<?=$this->load->view('default/_footer_admin')?>