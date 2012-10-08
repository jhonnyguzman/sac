<?=$this->load->view('default/_header_admin')?>

<div class="span28">
	<div class="page-header">
	  <h3><?=$title_header?></h3>
	</div>
	
	<?=$this->load->view("default/_result_messages")?>

	 <div class="row-fluid">
            <div class="span26">
            	<form action="<?=base_url()?>lineas_accion_escuelas_controller/search_c" method="post" name="formSearchlineas_accion_escuelas" id="formSearchlineas_accion_escuelas" class="well form-search">
					<input type="search" name="nombre" id="nombre" placeholder="Nombre" class="input-medium search-query"/>
					<button type="submit" class="btn" onClick="searchData('formSearchlineas_accion_escuelas','contentlineas_accion_escuelas')">Buscar</button>
				</form>	    

            </div>
            <div class="span2">
            	<div class="btn-group">
				  <button class="btn">Acciones</button>
				  <button class="btn dropdown-toggle" data-toggle="dropdown">
				    <span class="caret"></span>
				  </button>
				  <ul class="dropdown-menu">
				    <?php if($flag['i']):?>
						<li><a href="<?=base_url()?>lineas_accion_escuelas_controller/add_c" title='Nuevo'>Nuevo</a></li>
					<?php endif; ?>
				  </ul>
				</div>
            </div>
     </div>
     <div class="row-fluid" id="contentlineas_accion_escuelas"> </div>



 </div><!--/span10-->


 <script>
    $(document).ready(function(){ 
        $("#contentlineas_accion_escuelas").load("<?=base_url()?>lineas_accion_escuelas_controller/search_c");

    });
</script>

 <?=$this->load->view('default/_footer_admin')?>


