

	<form action="<?=base_url()?>a/login" method="post" name="formLoginusuarios" id="formLoginusuarios" class="form-signin">
		  <h2 class="form-signin-heading">Acceso</h2>
		   <input type="text" name="username" class="input-block-level" placeholder="Nombre de usuario">
	       <input type="password" name="password" class="input-block-level" placeholder="Contraseña">
	       <label class="checkbox">
	          <input type="checkbox" value="remember-me"> Recuerdame
	       </label>

	  	  <div class="errors" id="errors">
		  <?php
			echo validation_errors();
			if(isset($error)) echo $error;
		  ?>
		  </div>
		  <button class="btn btn-large btn-success" type="submit">Ingresar</button>
	</form>

