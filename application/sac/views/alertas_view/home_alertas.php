<?=$this->load->view('default/_header_admin')?>

<div class="span28">
	<div class="page-header">
	  <h3><?=$title_header?></h3>
	</div>
	
	<?=$this->load->view("default/_result_messages")?>

	<div class="row-fluid">
		 <div class="span28" id="formConsultasGenerales">
		 	<form action="<?=base_url()?>alertas_controller/searchCriterio1_c/" method="post" name="formAlertas" id="formAlertas" class="form-horizontal">
            		<div class="control-group">
            			<label class="control-label" for="periodo_id"><strong>Periodo Activo:</strong></label>
            			<div class="input-append">
            				<span class="input-xlarge uneditable-input"><?=$periodo_activo[0]->fecha_inicio." - ".$periodo_activo[0]->fecha_fin?></span>
						  	<input id="periodo_id" name="periodo_id" value="<?=$periodo_activo[0]->id?>" type="hidden">
						  	<button class="btn btn-primary" type="button" onClick="searchDataCuston('result-list')">Ver</button>
						</div>
					</div>
					<div class="control-group">
							<label class="control-label" for="mes"><strong>Mes:</strong></label>
						 	<div class="controls">
						  		<select id="mes" name="mes" class="input-large"></select>
						  	</div>
					  	</div>
					<div class="control-group">
							<label class="control-label" for="resolucion"><strong>&nbsp;</strong></label>
						  	<div class="controls">
						  		<label class="radio">
								  <input type="radio" name="chkCriterio" value="1" checked>
								  Un docente está realizando más de 4 horas.
								</label>
								<label class="radio">
								  <input type="radio" name="chkCriterio" value="2" >
								  Un docente se encuentra en dos o más líneas de acción diferentes.
								</label>
								<label class="radio">
								  <input type="radio" name="chkCriterio" value="3" >
								  Un docente desempeña diferentes perfiles.
								</label>
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

         
    });


    function searchDataCuston(loader)
	{   
		var check = $('input:radio[name=chkCriterio]:checked');
   	  	if(check.val() == 1) {  
	   		$.ajax({
		        type: 'POST',
		        url: $("#formAlertas").attr('action'),
		        data: $("#formAlertas").serialize(),	
		        success: function(data) {
		        		$("#"+loader).html(data);
		        }
	    	});               
        } else if(check.val() == 2) { 	
	   		$.ajax({
		        type: 'POST',
		        url: '<?=base_url()?>alertas_controller/searchCriterio2_c/',
		        data: $("#formAlertas").serialize(),	
		        success: function(data) {
		        		$("#"+loader).html(data);
		        }
	    	});         
		} else if(check.val() == 3) { 	
	   		$.ajax({
		        type: 'POST',
		        url: '<?=base_url()?>alertas_controller/searchCriterio3_c/',
		        data: $("#formAlertas").serialize(),	
		        success: function(data) {
		        		$("#"+loader).html(data);
		        }
	    	});         
		}	  
	}

</script>