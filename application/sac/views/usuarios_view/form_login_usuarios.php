<div class="container">

	  <form action="<?=base_url()?>a/login" method="post" name="formLoginusuarios" id="formLoginusuarios" class="well form-inline">
			
			<input type="text" name="username" id="username" class="input-small" placeholder="Username"/><p>
			<input type="password" name="password" id="password" class="input-small" placeholder="Password"/><p>	
			<button type="submit" class="btn">Ingresar</button><p>
			<div class="errors" id="errors">
			<?php
				echo validation_errors();
				if(isset($error)) echo $error;
			?>
			</div>
		</form>
	
</div>
