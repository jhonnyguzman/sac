<div class="formlogin">

	<form action="<?=base_url()?>a/login" method="post" name="formLoginusuarios" id="formLoginusuarios" class="form-horizontal">
		  <legend>Acceso</legend>
		  <div class="control-group">
		    <label class="control-label" for="username">Usuario</label>
		    <div class="controls">
		      <div class="input-prepend">
				  <span class="add-on"><i class="icon-user"></i></span><input class="span12" name="username" id="username" type="text" placeholder="Usuario">
			  </div>
		    </div>
		  </div>
		  <div class="control-group">
		    <label class="control-label" for="password">Contraseña</label>
		    <div class="controls">
		    	<div class="input-prepend">
		      		<span class="add-on"><i class="icon-briefcase"></i></span><input class="span12" name="password" id="password" type="text" placeholder="Contraseña">
		      	</div>
		    </div>
		  </div>
		  <div class="control-group">
		    <div class="controls">
		      <label class="checkbox">
		        <input type="checkbox"> Recuerdame
		      </label>
		      <button type="submit" class="btn btn-large btn-primary">Ingresar</button>
		    </div>
		  </div>

	  	  <div class="errors" id="errors">
		  <?php
			echo validation_errors();
			if(isset($error)) echo $error;
		  ?>
		</div>
	</form>

</div>
