<?=$this->load->view('default/_header_admin')?>

<div class="span28">
	<div class="page-header">
	  <h3><?=$title_header?></h3>
	</div>
	<form action="<?=base_url()?>lineas_accion_controller/edit_c/<?=$lineas_accion->id?>" method="post" name="formEditlineas_accion" id="formEditlineas_accion" class="form-horizontal">
		<input type="hidden" value="<?=$lineas_accion->id?>" name="id" id="id"/>
		<div class="control-group">
			<label class="control-label" for="nombre"><?=$this->config->item('nombre')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$lineas_accion->nombre?>" name="nombre" id="nombre"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="descripcion"><?=$this->config->item('descripcion')?>:</label>
			<div class="controls">
				<textarea name="descripcion" id="descripcion"  rows="8"><?=$lineas_accion->descripcion?></textarea>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="habilitado">Estado:</label>
			<div class="controls">
				Habilitado <input type='radio' name='habilitado' id='habilitado' value='1' <?php if ($lineas_accion->habilitado=="1") { echo "checked='checked'"; } ?> />
            	No Habilitado <input type='radio' name='habilitado' id='habilitado' value='0' <?php if ($lineas_accion->habilitado=="0") { echo "checked='checked'"; } ?> />
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="ciclo"><?=$this->config->item('ciclo_descripcion')?>:</label>
			<div class="controls">
				<?php foreach($ciclos as $f): ?>
					<?php if($f->id == $lineas_accion->ciclo): ?>
						<input type='text' name='ciclo_descripcion' id='ciclo_descripcion' value='<?=$f->descripcion?>' readonly />
						<input type='hidden' name='ciclo' id='ciclo' value='<?=$f->id?>' />
            		<?php endif; ?>
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