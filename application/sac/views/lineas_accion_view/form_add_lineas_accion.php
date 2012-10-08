<?=$this->load->view('default/_header_admin')?>

<div class="span28">
	<div class="page-header">
	  <h3><?=$title_header?></h3>
	</div>
	<form action="<?=base_url()?>lineas_accion_controller/add_c" method="post" name="formAddlineas_accion" id="formAddlineas_accion" class="form-horizontal">
		<div class="control-group">
			<label class="control-label" for="nombre"><?=$this->config->item('nombre')?>:</label>
			<div class="controls">
				<input type="text" name="nombre" id="nombre"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="descripcion"><?=$this->config->item('descripcion')?>:</label>
			<div class="controls">
				<textarea name="descripcion" id="descripcion"></textarea>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="habilitado"><?=$this->config->item('habilitado')?>:</label>
			<div class="controls">
				Si <input type='radio' name='habilitado' id='habilitado' value='1' />
            	No <input type='radio' name='habilitado' id='habilitado' value='0' checked='checked' />
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="ciclo"><?=$this->config->item('ciclo_descripcion')?>:</label>
			<div class="controls">
				<?php foreach($ciclos as $f): ?>
					<?=$f->descripcion?><input type='radio' name='ciclo' id='ciclo' value='<?=$f->id?>' checked/>
	            <?php endforeach; ?>
			</div>
		</div>
		<div class="form-actions">
	    	<a href="<?=base_url()?>lineas_accion_controller/index" class="btn" >Cancelar</a>
	    	<button type="submit" class="btn btn-primary" >Guardar</button>
	    </div>
	</form>
		
</div><!--/span10-->

<?=$this->load->view('default/_footer_admin')?>
