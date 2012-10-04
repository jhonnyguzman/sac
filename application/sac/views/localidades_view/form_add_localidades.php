<?=$this->load->view('default/_header_admin')?>

<div class="span16">
	<div class="page-header">
	  <h3><?=$title_header?></h3>
	</div>
	<form action="<?=base_url()?>localidades_controller/add_c" method="post" name="formAddlocalidades" id="formAddlocalidades" class="form-horizontal">
		<div class="control-group">
        	<label class="control-label" for="nombre"><?=$this->config->item('nombre')?></label>
            <div class="controls">
                <input type="text" name="nombre" id="nombre"></input></span>
            </div>
        </div>
        <div class="control-group">
        	<label class="control-label" for="habilitado"><?=$this->config->item('habilitado')?></label>
            <div class="controls">
            	<input type="radio" name="habilitado" id='habilitado' value='1' /> Habilitado &nbsp;&nbsp;
            	<input type="radio" name="habilitado" id='habilitado' value='0' checked='checked' /> No Habilitado
            </div>
        </div>
		<div class="form-actions">
        	<a href="<?=base_url()?>localidades_controller/index" class="btn" >Cancelar</a>
        	<button type="submit" class="btn btn-primary" >Guardar</button>
        </p>
	</form>
</div><!--/span10-->

<SCRIPT LANGUAGE='JavaScript'>
	var nombre = new LiveValidation('nombre'); nombre.add( Validate.Presence ); nombre.add( Validate.Length, { maximum: 16 } );
	var departamento_id = new LiveValidation('departamento_id'); departamento_id.add( Validate.Presence );
</SCRIPT>

<?=$this->load->view('default/_footer_admin')?>