<div class="modal-header">
    	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
   		<h4>Escuela:&nbsp;<?=$escuelas->nombre?>&nbsp;CUE:&nbsp;<?=$escuelas->cue?> </h4>
</div>
<div class="modal-body">
	<form name="formEditescuelas" id="formEditescuelas"  >
		
		<div class="control-group">
			<label class="control-label" for="direccion"><?=$this->config->item('direccion')?>:</label>
			<div class="controls">
				<span class="input-xlarge uneditable-input"><?=$escuelas->direccion?></span>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="telefono"><?=$this->config->item('telefono')?>:</label>
			<div class="controls">
				<span class="input-xlarge uneditable-input"><?=$escuelas->telefono?></span>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="email"><?=$this->config->item('email')?>:</label>
			<div class="controls">
				<span class="input-xlarge uneditable-input"><?=$escuelas->email?></span>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="habilitado"><?=$this->config->item('habilitado')?>:</label>
			<div class="controls">
				Si <input type='radio' name='habilitado' id='habilitado' value='1' disabled <?php if ($escuelas->habilitado=="1") { echo "checked='checked'"; } ?> />
            	No <input type='radio' name='habilitado' id='habilitado' value='0' disabled <?php if ($escuelas->habilitado=="0") { echo "checked='checked'"; } ?> />
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="departamento_id"><?=$this->config->item('departamento_nombre')?>:</label>
			<div class="controls">
				<span class="input-xlarge uneditable-input"><?=$escuelas->departamento_nombre?></span>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="localidad_id"><?=$this->config->item('localidad_nombre')?>:</label>
			<div class="controls">
				<span class="input-xlarge uneditable-input"><?=$escuelas->localidad_nombre?></span>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="director_id"><?=$this->config->item('director_nombre')?>:</label>
			<div class="controls">
				<span class="input-xlarge uneditable-input"><?=$escuelas->director_apellido?></span>
			</div>
		</div>
		
	</form>
</div>
<div class="modal-footer">
	
</div>

	


