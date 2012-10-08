<?=$this->load->view('default/_header_admin')?>

<div class="span28">
	<div class="page-header">
	  <h3><?=$title_header?></h3>
	</div>
	
	<?=$this->load->view("default/_result_messages")?>

	 <div class="row-fluid">
            <div class="span26">
            	<form action="<?=base_url()?>directores_controller/search_c" method="post" name="formSearchdirectores" id="formSearchdirectores" class="well form-search">
					<input type="search" name="dni" id="dni" placeholder="dni" class="input-medium search-query"/>
					<input type="search" name="apellido" id="apellido" placeholder="apellido" class="input-medium search-query"/>
					<input type="search" name="nombre" id="nombre" placeholder="nombre" class="input-medium search-query"/>
					<button type="submit" class="btn" onClick="searchData('formSearchdirectores','result-list')">Buscar</button>
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
						<li><a href="<?=base_url()?>directores_controller/add_c" title='Nuevo'>Nuevo</a></li>
					<?php endif; ?>
				  </ul>
				</div>
            </div>
     </div>
     <div class="row-fluid" id="result-list"> </div>

 </div><!--/span10-->


 <script>
    $(document).ready(function(){ 
        $("#result-list").load("<?=base_url()?>directores_controller/search_c");
    });
</script>

 <?=$this->load->view('default/_footer_admin')?>