<?=$this->load->view('default/_header_admin')?>

<div class="span10">
	<div class="page-header">
	  <h1><?=$title_header?></h1>
	</div>
	<form action="<?=base_url()?>usuarios_controller/edit_c/<?=$usuarios->id?>" method="post" name="formEditusuarios" id="formEditusuarios" class="stdform">
		<div class="control-group">
			<label class="control-label" for="id"><?=$this->config->item('id')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$usuarios->id?>" name="id" id="id"  readonly="readonly" />
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="username"><?=$this->config->item('username')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$usuarios->username?>" name="username" id="username" readonly="true" />
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="password"><?=$this->config->item('password')?>:</label>
			<div class="controls">
				<input type="password" name="password" id="password" />
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="nombre"><?=$this->config->item('nombre')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$usuarios->nombre?>" name="nombre" id="nombre" />
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="apellido"><?=$this->config->item('apellido')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$usuarios->apellido?>" name="apellido" id="apellido" />
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="email"><?=$this->config->item('email')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$usuarios->email?>" name="email" id="email" />
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="direccion"><?=$this->config->item('direccion')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$usuarios->direccion?>" name="direccion" id="direccion" />
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="telefono"><?=$this->config->item('telefono')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$usuarios->telefono?>" name="telefono" id="telefono" />
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="estado"><?=$this->config->item('estado')?>:</label>
			<div class="controls">
				<select name="estado" id="estado" >
					<?php foreach ($estados as $f): ?>
						<?php if($f->id == $usuarios->estado): ?>
							<option value="<?=$f->id?>" selected ><?=$f->descripcion?></option>
						<?php else: ?>
							<option value="<?=$f->id?>"><?=$f->descripcion?></option>
						<?php endif; ?>
					<?php endforeach; ?>
				</select>
			</div>			
		</div>
		<div class="control-group">
			<label class="control-label" for="perfiles_id"><?=$this->config->item('perfiles_id')?>:</label>
			<div class="controls">
				<select name="perfiles_id" id="perfiles_id" >
					<?php foreach ($perfiles as $f): ?>
						<?php if($f->id == $usuarios->perfiles_id): ?>
							<option value="<?=$f->id?>" selected ><?=$f->descripcion?></option>
						<?php else: ?>
							<option value="<?=$f->id?>"><?=$f->descripcion?></option>
						<?php endif; ?>
					<?php endforeach; ?>
				</select>
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="created_at"><?=$this->config->item('created_at')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$usuarios->created_at?>" name="created_at" id="created_at" readonly="true" />
			</div>
		</div>
		<p class="stdformbutton">
	    	<a href="<?=base_url()?>usuarios_controller/index" class="btn" >Cancelar</a>
	    	<button type="submit" class="submit radius2">Guardar</button>
	    </p>

</div><!--/span10-->
<SCRIPT LANGUAGE='JavaScript'>
	var username = new LiveValidation('username'); username.add( Validate.Presence );
	var password = new LiveValidation('password'); password.add( Validate.Presence );
	var nombre = new LiveValidation('nombre'); nombre.add( Validate.Presence );
	var apellido = new LiveValidation('apellido'); apellido.add( Validate.Presence );
	var email = new LiveValidation('email'); email.add( Validate.Email ); email.add( Validate.Presence );
	var telefono = new LiveValidation('telefono'); telefono.add( Validate.Numericality );
</SCRIPT>
<?=$this->load->view('default/_footer_admin')?>
