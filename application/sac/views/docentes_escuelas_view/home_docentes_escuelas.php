<?=$this->load->view('default/_header_admin')?>

<div class="span10">
	<div class="page-header">
	  <h1><?=$title_header?></h1>
	</div>
	
	<?=$this->load->view("default/_result_messages")?>

	 <div class="row-fluid">
            <div class="span10">
            	<form action="<?=base_url()?>docentes_escuelas_controller/search_c" method="post" name="formSearchdocentes" id="formSearchdocentes" class="well form-search">
					<input type="search" name="dni" id="dni" placeholder="dni" class="input-medium search-query"/>
					<input type="search" name="apellido" id="apellido" placeholder="apellido" class="input-medium search-query"/>
					<input type="search" name="nombre" id="nombre" placeholder="nombre" class="input-medium search-query"/>
					<button type="submit" class="btn" onClick="searchData('formSearchdocentes','result-list')">Buscar</button>
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
						<li><a href="<?=base_url()?>docentes_escuelas_controller/add_c" title='Nuevo'>Nuevo</a></li>
					<?php endif; ?>
				  </ul>
				</div>
            </div>
     </div>
     <div class="row-fluid" id="result-list"> </div>

 </div><!--/span10-->


 <script>
    $(document).ready(function(){ 
        $("#result-list").load("<?=base_url()?>docentes_escuelas_controller/search_c");
    });
</script>

 <?=$this->load->view('default/_footer_admin')?>