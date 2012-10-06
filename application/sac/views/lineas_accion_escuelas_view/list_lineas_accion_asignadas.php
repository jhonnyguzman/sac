<form action="<?=base_url()?>lineas_accion_escuelas_controller/search_c" 
	name="formSearchLineasAccionEscuelas" id="formSearchLineasAccionEscuelas" class="form-inline">

  <!--<input type="hidden" name="escuela_id" id="escuela_id" value="<?=$periodo_escuela_activo[0]->escuelas_id?>">-->
  
  Periodo:
  <select name="periodo_escuela_id" id="periodo_escuela_id"
  	onChange="getMeses('<?=base_url()?>lineas_periodos_escuelas_controller/getMeses/','','periodo_escuela_id','linea_periodo_escuela_id')">
  		<?php foreach($periodo_escuela_activo as $f):?>
  			<option value="<?=$f->id?>"><?=$f->periodo_fecha_inicio." - ".$f->periodo_fecha_fin?></option>
  		<?php endforeach; ?>
  		<?php foreach($periodos_escuela_historicos as $f):?>
  			<option value="<?=$f->id?>"><?=$f->periodo_fecha_inicio." - ".$f->periodo_fecha_fin?></option>
  		<?php endforeach; ?>
  </select>
  Mes:
  <select name="linea_periodo_escuela_id"  id="linea_periodo_escuela_id">
  </select>
 
  <button type="submit" class="btn" onClick="searchData('formSearchLineasAccionEscuelas','resultLineas')">Buscar</button>
</form>
<br>
<div id="resultLineas">
	
</div>
<script type="text/javascript">
	
	$(document).ready(function(){
		getMeses("<?=base_url()?>lineas_periodos_escuelas_controller/getMeses/",'',"periodo_escuela_id", "linea_periodo_escuela_id");

		$.ajax({
	        type: 'POST',
	        url: '<?=base_url()?>lineas_accion_escuelas_controller/search_c/',
	        data: {periodo_escuela_id: $("#periodo_escuela_id").val()},	
	        success: function(data) {
	        		$("#resultLineas").html(data);
	        }
    	});   
	});
</script>