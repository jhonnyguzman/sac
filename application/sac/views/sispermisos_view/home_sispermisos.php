<?=$this->load->view('default/_header_admin')?>

<div class="span10">
	<div class="page-header">
	  <h1><?=$title_header?></h1>
	</div>
	
	<?=$this->load->view("default/_result_messages")?>

	 <div class="row-fluid">
            <div class="span10">
            	<form action="<?=base_url()?>sispermisos_controller/search_c" method="post" name="formSearchsyspermisos" id="formSearchsyspermisos" class="well form-search">
					<input type="search" name="tabla" id="tabla" placeholder="Nombre de tabla" class="input-medium search-query"/>
					<button type="submit" class="btn" onClick="searchData('formSearchsyspermisos','contentsyspermisos')">Buscar</button>
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
						<li><a href="<?=base_url()?>sispermisos_controller/add_c" title='Nuevo'>Nuevo</a></li>
					<?php endif; ?>
				  </ul>
				</div>
            </div>
     </div>
     <div class="row-fluid" id="contentsyspermisos"> </div>



 </div><!--/span10-->


 <script>
    $(document).ready(function(){ 
        $("#contentsyspermisos").load("<?=base_url()?>sispermisos_controller/search_c");

    });
</script>

 <?=$this->load->view('default/_footer_admin')?>