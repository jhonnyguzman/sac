<?=$this->load->view('default/_header_admin')?>

<div class="span10">
	<div class="page-header">
	  <h1><?=$title_header?></h1>
	</div>
	
	<?php if(validation_errors() || isset($error)): ?>
		<div class="alert alert-error">
			<a class="close" data-dismiss="alert" href="#">×</a>
			<?=validation_errors()?>
			
		</div>		
	<?php endif; ?>
	<form action="<?=base_url()?>escuelas_controller/edit_c/<?=$escuelas->id?>" method="post" name="formEditescuelas" id="formEditescuelas"  class="form-horizontal">
		<div class="control-group">
			<label class="control-label" for="id"><?=$this->config->item('id')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$escuelas->id?>" name="id" id="id"  readonly="readonly"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="cue"><?=$this->config->item('cue')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$escuelas->cue?>" name="cue" id="cue"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="nombre"><?=$this->config->item('nombre')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$escuelas->nombre?>" name="nombre" id="nombre"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="direccion"><?=$this->config->item('direccion')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$escuelas->direccion?>" name="direccion" id="direccion"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="telefono"><?=$this->config->item('telefono')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$escuelas->telefono?>" name="telefono" id="telefono"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="email"><?=$this->config->item('email')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$escuelas->email?>" name="email" id="email"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="habilitado"><?=$this->config->item('habilitado')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$escuelas->habilitado?>" name="habilitado" id="habilitado"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="localidad_id"><?=$this->config->item('localidad_nombre')?>:</label>
			<div class="controls">
				<select name="localidad_id" id="localidad_id" >
					<?php foreach ($localidades as $f): ?>
						<?php if($f->id == $escuelas->localidad_id): ?>
							<option value="<?=$f->id?>" selected ><?=$f->nombre?></option>
						<?php else: ?>
							<option value="<?=$f->id?>"><?=$f->nombre?></option>
						<?php endif; ?>
					<?php endforeach; ?>
				</select>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="director_id"><?=$this->config->item('director_nombre')?>:</label>
			<div class="controls">
				<select name="director_id" id="director_id" >
					<?php foreach ($directores as $f): ?>
						<?php if($f->id == $escuelas->director_id): ?>
							<option value="<?=$f->id?>" selected ><?=$f->apellido." ".$f->nombre?></option>
						<?php else: ?>
							<option value="<?=$f->id?>"><?=$f->apellido." ".$f->nombre?></option>
						<?php endif; ?>
					<?php endforeach; ?>
				</select>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="created_at"><?=$this->config->item('created_at')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$escuelas->created_at?>" name="created_at" id="created_at" readonly="true"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="updated_at"><?=$this->config->item('updated_at')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$escuelas->updated_at?>" name="updated_at" id="updated_at" readonly="true"></input>
			</div>
		</div>
		
		<div class="form-actions">
			<a href="<?=base_url()?>escuelas_controller/index" class="btn" >Cancelar</a>
			<button type="submit" class="btn btn-primary">Modificar</button>
		</div>
		
	</form>

</div><!--/span10-->

<?=$this->load->view('default/_footer_admin')?>
