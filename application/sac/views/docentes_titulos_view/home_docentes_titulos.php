<?=$this->load->view('default/_header_admin')?>

<div class="span16">
	<div class="page-header">
	  <h3><?=$title_header?></h3>
	</div>
	
	<?=$this->load->view("default/_result_messages")?>

	 <div class="row-fluid">
            <div class="span14">
            	<form action="<?=base_url()?>docentes_titulos_controller/search_c" method="post" name="formSearchdocentes_titulos" id="formSearchdocentes_titulos" class="well form-search">
					<input type="search" name="docente_id" id="docente_id" placeholder="docente_id" class="input-medium search-query"/>
					<input type="search" name="titulo_id" id="titulo_id" placeholder="titulo_id" class="input-medium search-query"/>
					<button type="submit" class="btn" onClick="searchData('formSearchdocentes_titulos','result-list')">Buscar</button>
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
						<li><a href="<?=base_url()?>docentes_titulos_controller/add_c" title='Nuevo'>Nuevo</a></li>
					<?php endif; ?>
				  </ul>
				</div>
            </div>
     </div>
     <div class="row-fluid" id="result-list"> </div>

 </div><!--/span10-->


 <script>
    $(document).ready(function(){ 
        $("#result-list").load("<?=base_url()?>docentes_titulos_controller/search_c");
    });
</script>

 <?=$this->load->view('default/_footer_admin')?>