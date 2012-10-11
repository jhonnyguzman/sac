<?=$this->load->view('default/_header_admin')?>

<div class="span28">
	<div class="page-header">
	  <h3><?=$title_header?></h3>
	</div>
	
	<?=$this->load->view("default/_result_messages")?>

	<div class="row-fluid">
            <div class="span28" id="formConsultasGenerales">
            	<form action="<?=base_url()?>consultas_controller/search_c/" method="post" name="formSearch" id="formSearch" class="form-horizontal">
            		<div class="control-group">
            			<label class="control-label" for="docente_id"><strong>Docente:</strong></label>
						<div class="input-append">	
							  <select name="docente_id" id="docente_id" class="span18">
							  		<option value="">Todos</option>
						  			<?php foreach($docentes as $f): ?> 
						  				<option value="<?=$f->id?>"><?=$f->apellido." ".$f->nombre?></option>
						  			<?php endforeach; ?>
						  		</select>
							  <button class="btn" type="button"  onClick="searchDataCuston('result-list')">Buscar</button>
							  <button class="btn" type="button" onClick="$('.extraSearch').toggle();">Opciones</button>	
						</div>
					</div>
					<div class="extraSearch">
						<div class="control-group">
					  		<label class="control-label" for="docente_dni"><strong>DNI:</strong></label>
						 	<div class="controls">
						  		<input class="span8" id="docente_dni" name="docente_dni" placeholder="Docente DNI" size="8" type="text">
						  	</div>
						</div>
						<div class="control-group">
					  		<label class="control-label" for="escuela_id"><strong>Escuela:</strong></label>
						  	<div class="controls">
						  		<select name="escuela_id" id="escuela_id" class="span8">
						  			<option value="">Todas</option>
						  			<?php foreach($escuelas as $f): ?> 
						  				<option value="<?=$f->id?>"><?=$f->nombre?></option>
						  			<?php endforeach; ?>
						  		</select>
						  	</div>
						</div>
						<div class="control-group">
	            			<label class="control-label" for="periodo_escuela_id"><strong>Periodo</strong></label>
	            			<div class="controls">
								<select name="periodo_id" id="periodo_id" class="span8">
									<option value="" >Todos</option>
						  			<?php foreach($periodo_activo as $f): ?> 
						  				<option value="<?=$f->id?>"><?=$f->fecha_inicio." - ".$f->fecha_fin?></option>
						  			<?php endforeach; ?>
						  			<?php foreach($periodos_historicos as $f): ?> 
						  				<option value="<?=$f->id?>"><?=$f->fecha_inicio." - ".$f->fecha_fin?></option>
						  			<?php endforeach; ?>
							  	</select>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="mes"><strong>Mes:</strong></label>
						 	<div class="controls">
						  		<select id="mes" name="mes"  class="span8"></select>
						  	</div>
					  	</div>
					  	<div class="control-group">
							<label class="control-label" for="resolucion"><strong>Resolución:</strong></label>
						  	<div class="controls">
						  		<input class="span8" id="resolucion" name="" placeholder="N° de resolución" size="16" type="text">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="circuito_id"><strong>Circuito:</strong></label>
						  	<div class="controls">
						  		<option value="" >Todos</option>
						  		<select name="circuito_id" id="circuito_id" class="span8">
						  			<?php foreach($circuitos as $f): ?> 
						  				<option value="<?=$f->id?>"><?=$f->nombre?></option>
						  			<?php endforeach; ?>
						  		</select>
						  	</div>
					  	</div>
					  	<div class="control-group">
							<label class="control-label" for="resolucion"><strong>&nbsp;</strong></label>
						  	<div class="controls">
						  		<label class="radio">
								  <input type="radio" name="horas_restantes" value="1" >
								  Escuelas que han utilizado la cantidad máxima de sus horas.
								</label>
								<label class="radio">
								  <input type="radio" name="horas_restantes" value="2" >
								  Escuelas que han utilizado más de la cantidad máxima de sus horas.
								</label>
								<label class="radio">
								  <input type="radio" name="horas_restantes" value="3" >
								  Escuelas que han utilizado menos de la cantidad máxima de sus horas.
								</label>
								<label class="radio">
								  <a href="#" id="btnUncheked">Desmarcar opciones</a>
								</label>
							</div>
						</div>
			
					</div>
				</form>	    
            </div>
     </div>
     <div class="row-fluid"> 
     	<div class="span28" id="result-list">
     </div>

 </div><!--/span28-->


<script type="text/javascript">
    $(document).ready(function(){ 
        getMesesConsultas("<?=base_url()?>periodos_controller/getMeses/","","periodo_id","mes");
        $("#periodo_id").change(function(){
        	getMesesConsultas("<?=base_url()?>periodos_controller/getMeses/","","periodo_id","mes");
        });

        $("#btnUncheked").click(function(){
        	$("input:radio[name=horas_restantes]").attr("checked",false);
        });
    });

    

    function searchDataCuston(loader)
	{   
		
		var check = $('input:radio[name=horas_restantes]:checked');
   	  	if(check.val()) {  
          
		   		$.ajax({
			        type: 'POST',
			        url: '<?=base_url()?>consultas_controller/searchHorasEscuelas_c/',
			        data: $("#formSearch").serialize(),	
			        success: function(data) {
			        		$("#"+loader).html(data);
			        }
		    	});         
		       
        } else { 
			
		   		$.ajax({
			        type: 'POST',
			        url: $("#formSearch").attr('action'),
			        data: $("#formSearch").serialize(),	
			        success: function(data) {
			        		$("#"+loader).html(data);
			        }
		    	});         
		      
		}	  
	}
</script>


 <?=$this->load->view('default/_footer_admin')?>