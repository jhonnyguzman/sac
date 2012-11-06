<?=$this->load->view('default/_header_admin')?>

<div class="span28">
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
        	<label class="control-label" for="habilitado">Estado</label>
            <div class="controls">
            	<select name="habilitado" id="habilitado">
                    <option value="1" selected>Habilitado</option>
                    <option value="0"> No habilitado</option>
                </select>
            </div>
        </div>
		<div class="form-actions">
        	<a href="<?=base_url()?>localidades_controller/index" class="btn" >Cancelar</a>
        	<button type="submit" class="btn btn-primary" >Guardar</button>
        </div>
	</form>
</div><!--/span28-->


<?=$this->load->view('default/_footer_admin')?>