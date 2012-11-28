<?=$this->load->view('default/_header_admin')?>

<div class="span28">
	<div class="page-header">
	  <h3><?=$title_header?></h3>
	</div>
	
	<?=$this->load->view("default/_result_messages")?>

	 <div class="row-fluid">
            <div class="span26">
            	<form action="<?=base_url()?>proyectos_personas_controller/search_c" method="post" name="formSearchproyectos_personas" id="formSearchproyectos_personas" class="well form-search">
            		<?php foreach($fieldSearch as $field):?>
            			<input type="search" name="<?=$field?>" id="<?=$field?>" placeholder="<?=$this->config->item($field)?>" class="input-medium search-query"></input>
					<?php endforeach; ?>
					<button type="submit" class="btn" onClick="searchData('formSearchproyectos_personas','result-list')">Buscar</button>
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
						<li><a href="<?=base_url()?>proyectos_personas_controller/add_c" title='Nuevo'>Nuevo</a></li>
					<?php endif; ?>
				  </ul>
				</div>
            </div>
     </div>
     <div class="row-fluid" id="result-list"> </div>

 </div><!--/span10-->


 <script>
    $(document).ready(function(){ 
        $("#result-list").load("<?=base_url()?>proyectos_personas_controller/search_c");
    });
</script>

 <?=$this->load->view('default/_footer_admin')?>
