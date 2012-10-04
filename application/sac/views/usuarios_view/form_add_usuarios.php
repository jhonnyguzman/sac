<?=$this->load->view('default/_header_admin')?>

<div class="span16">
	<div class="page-header">
	  <h3><?=$title_header?></h3>
	</div>
	<?php if(validation_errors() || isset($error)): ?>
		<div class="alert alert-error">
			<a class="close" data-dismiss="alert" href="#">×</a>
			<?=validation_errors()?>
			
		</div>		
	<?php endif; ?>
	<form action="<?=base_url()?>usuarios_controller/add_c" method="post" name="formAddusuarios" id="formAddusuarios" class="form-horizontal">
		<div class="control-group">
			<label class="control-label" for="username"><?=$this->config->item('username')?>:</label>
			<div class="controls">
				<input type="text" name="username" id="username" value="<?php echo set_value('username'); ?>"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="password"><?=$this->config->item('password')?>:</label>
			<div class="controls">
				<input type="password" name="password" id="password" value="<?php echo set_value('password'); ?>"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="passwordconf">Repite contraseña:</label>
			<div class="controls">
				<input type="password" name="passwordconf" id="passwordconf" value="<?php echo set_value('passwordconf'); ?>"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label"  for="nombre"><?=$this->config->item('nombre')?>:</label>
			<div class="controls">
				<input type="text" name="nombre" id="nombre" value="<?php echo set_value('nombre'); ?>"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="apellido"><?=$this->config->item('apellido')?>:</label>
			<div class="controls">
				<input type="text" name="apellido" id="apellido" value="<?php echo set_value('apellido'); ?>"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="email"><?=$this->config->item('email')?>:</label>
			<div class="controls">
				<input type="text" name="email" id="email" value="<?php echo set_value('email'); ?>"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="direccion"><?=$this->config->item('direccion')?>:</label>
			<div class="controls">
				<input type="text" name="direccion" id="direccion" value="<?php echo set_value('direccion'); ?>"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="telefono"><?=$this->config->item('telefono')?>:</label>
			<div class="controls">
				<input type="text" name="telefono" id="telefono" value="<?php echo set_value('telefono'); ?>"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="estado"><?=$this->config->item('estado')?>:</label>
			<div class="controls">
				<select name="estado" id="estado" >
					<?php foreach ($estados as $f): ?>
						<option value="<?=$f->id?>" <?=set_select('estado',$f->id)?> ><?=$f->descripcion?></option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="perfiles_id"><?=$this->config->item('perfiles_id')?>:</label>
			<div class="controls">
				<select name="perfiles_id" id="perfiles_id" >
					<?php foreach ($perfiles as $f): ?>
						<option value="<?=$f->id?>" <?=set_select('perfiles_id',$f->id)?> ><?=$f->descripcion?></option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>
		<div class="form-actions">
	    	<a href="<?=base_url()?>usuarios_controller/index" class="btn" >Cancelar</a>
	    	<button type="submit" class="btn btn-primary" >Guardar</button>
	    </p>
	</form>

</div><!--/span10-->

<?=$this->load->view('default/_footer_admin')?>
