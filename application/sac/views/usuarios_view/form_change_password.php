<?=$this->load->view('default/_header_admin')?>

<div class="span28">
	<div class="page-header">
	  <h3><?=$title_header?></h3>
	</div>
	
	<?=$this->load->view("default/_result_messages")?>

	<?php if(validation_errors() || isset($error)): ?>
		<div class="alert alert-error">
			<a class="close" data-dismiss="alert" href="#">×</a>
			<?=validation_errors()?>
			
		</div>		
	<?php endif; ?>
	<form action="<?=base_url()?>usuarios_controller/changePassword/" method="post" name="formChangePassword" id="formChangePassword" class="form-horizontal">
		
		<input type="hidden" value="<?=$usuarios->id?>" name="id" id="id"  readonly="readonly" />
		
		<div class="control-group">
			<label class="control-label" for="password">Nueva contraseña:</label>
			<div class="controls">
				<input type="password" name="password" id="password" />
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="passwordconf">Repite contraseña:</label>
			<div class="controls">
				<input type="password" name="passwordconf" id="passwordconf" ></input>
			</div>
		</div>
		
		<div class="form-actions">
	    	<button type="submit" class="btn btn-primary" >Modificar</button>
	    </div>

</div><!--/span10-->

<?=$this->load->view('default/_footer_admin')?>
