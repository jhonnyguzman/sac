<?=$this->load->view('default/_header_admin')?>

<div class="span10">
	<div class="page-header">
	  <h1><?=$title_header?></h1>
	</div>
	<form action="<?=base_url()?>docentes_escuelas_controller/add_c" method="post" name="formAdddocentes_escuelas" id="formAdddocentes_escuelas" class="stdform">
		<div class="control-group">
				<label class="control-label" for="docente_perfil_id"><?=$this->config->item('docente_perfil_id')?>:</label>
			<input type="text" name="docente_perfil_id" id="docente_perfil_id"></input>
		</div>
		<div class="control-group">
				<label class="control-label" for="escuela_id"><?=$this->config->item('escuela_id')?>:</label>
			<input type="text" name="escuela_id" id="escuela_id"></input>
		</div>
		<p class="stdformbutton">
	    	<a href="<?=base_url()?>docentes_escuelas_controller/index" class="btn" >Cancelar</a>
	    	<button type="submit" class="submit radius2">Guardar</button>
	    </p>
		</form>		
</div><!--/span10-->

<?=$this->load->view('default/_footer_admin')?>