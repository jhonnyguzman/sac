<?=$this->load->view('default/_header_admin')?>

<div class="span10">
	<div class="page-header">
	  <h1><?=$title_header?></h1>
	</div>
	
	<?=$this->load->view("default/_result_messages")?>

	 <div class="row-fluid">
	 	<div class="span12">
	        <form action="<?=base_url()?>sispermisos_controller/add_c" method="post" name="formAddsispermisos" 
			id="formAddsispermisos" >
	  			<legend>Seleccione un perfil:</legend>

	  			<select name="perfiles_id" id="perfiles_id" 
	  				onChange="showContentTabMenu('<?=base_url()?>sisperfil_controller/getMenuAsignados_c/','menusAsignados')">
	  				<?php foreach($perfiles as $f): ?>
	  					<option value="<?=$f->id?>"><?=$f->descripcion?></option>
	  				<?php endforeach; ?>
	  			</select>
			</form>
			<br>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span12">
			<ul class="nav nav-tabs" id="tabMenus">
			  <li class="active"><a href="#menusAsignados" data-toggle="tab" 
			  	onClick="showContentTabMenu('<?=base_url()?>sisperfil_controller/getMenuAsignados_c/','menusAsignados')">Menus Asignados</a></li>
			  <li><a href="#menusSinAsignar" data-toggle="tab"
			  	onClick="showContentTabMenu('<?=base_url()?>sisperfil_controller/getMenuSinAsignar_c/','menusSinAsignar')">Menus sin asignar</a></li>
			</ul>
			 
			<div class="tab-content">
			  <div class="tab-pane active" id="menusAsignados"></div>
			  <div class="tab-pane" id="menusSinAsignar"></div>
			</div>
		</div>
     </div>


 </div><!--/span10-->


 <script>
    $(document).ready(function(){ 
    	showContentTabMenu("<?=base_url()?>sisperfil_controller/getMenuAsignados_c/", "menusAsignados");
    });
</script>

 <?=$this->load->view('default/_footer_admin')?>