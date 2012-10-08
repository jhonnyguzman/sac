<?=$this->load->view('default/_header_admin')?>

<div class="span28">
	<div class="page-header">
	  <h3><?=$title_header?></h3>
	</div>
	
	<?=$this->load->view("default/_result_messages")?>

	<div class="row-fluid">
            <div class="span16" id="formConsultasGenerales">
            	<form action="<?=base_url()?>consultas_controller/search_c/" method="post" name="formSearch" id="formSearch" class="form-horizontal">
            		<div class="control-group">
            			<label class="control-label" for="docente_id"><strong>Docente:</strong></label>
						<div class="input-append">	
							  <select name="docente_id" id="docente_id" class="span10">
							  		<option value="">Todos</option>
						  			<?php foreach($docentes as $f): ?> 
						  				<option value="<?=$f->id?>"><?=$f->apellido." ".$f->nombre?></option>
						  			<?php endforeach; ?>
						  		</select>
							  <button class="btn" type="submit"  onClick="searchData('formSearch','result-list')">Buscar</button>
							  <button class="btn" type="button" onClick="$('.extraSearch').toggle();">Opciones</button>	
						</div>
					</div>
					<div class="extraSearch">
						<div class="control-group">
					  		<label class="control-label" for="docente_dni"><strong>DNI:</strong></label>
						 	<div class="controls">
						  		<input class="span4" id="docente_dni" name="docente_dni" placeholder="Docente DNI" size="16" type="text">
						  	</div>
						</div>
						<div class="control-group">
					  		<label class="control-label" for="escuela_id"><strong>Escuela:</strong></label>
						  	<div class="controls">
						  		<select name="escuela_id" id="escuela_id" class="span4">
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
								<select name="periodo_id" id="periodo_id" class="span4">
									<option value="" >Todos</option>
						  			<?php foreach($periodo_escuela_activo as $f): ?> 
						  				<option value="<?=$f->periodo_id?>-<?=$f->id?>"><?=$f->periodo_fecha_inicio." - ".$f->periodo_fecha_fin?></option>
						  			<?php endforeach; ?>
						  			<?php foreach($periodos_escuela_historicos as $f): ?> 
						  				<option value="<?=$f->periodo_id?>-<?=$f->id?>"><?=$f->periodo_fecha_inicio." - ".$f->periodo_fecha_fin?></option>
						  			<?php endforeach; ?>
							  	</select>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="linea_periodo_escuela_id"><strong>Mes:</strong></label>
						 	<div class="controls">
						  		<select id="linea_periodo_escuela_id" name="linea_periodo_escuela_id"  class="span4"></select>
						  	</div>
					  	</div>
					  	<div class="control-group">
							<label class="control-label" for="resolucion"><strong>Resolución:</strong></label>
						  	<div class="controls">
						  		<input class="span4" id="resolucion" name="" placeholder="N° de resolución" size="16" type="text">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="circuito_id"><strong>Circuito:</strong></label>
						  	<div class="controls">
						  		<option value="" >Todos</option>
						  		<select name="circuito_id" id="circuito_id" class="span4">
						  			<?php foreach($circuitos as $f): ?> 
						  				<option value="<?=$f->id?>"><?=$f->nombre?></option>
						  			<?php endforeach; ?>
						  		</select>
						  	</div>
					  	</div>
					</div>
				</form>	    
            </div>
     </div>
     <div class="page-header">
	  <h4>Resultado</h4>
	</div>
     <div class="row-fluid" id="result-list"> </div>

 </div><!--/span10-->


<script type="text/javascript">
    $(document).ready(function(){ 
        getMesesConsultas("<?=base_url()?>lineas_periodos_escuelas_controller/getMeses/","","periodo_id","linea_periodo_escuela_id");
        $("#periodo_id").change(function(){
        	getMesesConsultas("<?=base_url()?>lineas_periodos_escuelas_controller/getMeses/","","periodo_id","linea_periodo_escuela_id");
        });
    });
</script>


 <?=$this->load->view('default/_footer_admin')?>