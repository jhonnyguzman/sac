<?=$this->load->view("default/_result_messages_modal")?>

<ul class="nav nav-tabs">
  <li class="active"><a href="#docentesPerfilAsignados" data-toggle="tab">Docentes Asignados</a></li>
  <li><a href="#asignarDocentePerfil" data-toggle="tab"
  	onClick="updateContent('<?=base_url()?>lineas_accion_docentes_controller/add_c/<?=$linea_accion_escuela_id?>','asignarDocentePerfil')">Asignar</a></li>
</ul>

<div class="tab-content">
  <div class="tab-pane active" id="docentesPerfilAsignados"></div>
  <div class="tab-pane" id="asignarDocentePerfil"></div>
</div>

<script type="text/javascript">
	
	$(document).ready(function(){
		$.ajax({
	        type: 'POST',
	        url: '<?=base_url()?>lineas_accion_docentes_controller/search_c/',
	        data: {linea_accion_escuela_id: '<?=$linea_accion_escuela_id?>'},
	        success: function(data) {
	               $("#docentesPerfilAsignados").html(data);
	        }
        });

		$("#contentModalFooter").find(".btnBack").remove();
        var a = $("<a href=\"#\" onClick=\"updateContent('<?=base_url()?>lineas_accion_escuelas_controller/show_c/<?=$escuela_id?>','contentModal')\" class=\"btnBack\">Volver</a> ");  
        $("#contentModalFooter").append(a);

        $("#extraContentHeader").find(".extraContentHeaderP").remove();
        var sp = $("<span class=\"extraContentHeaderP\"><br>Linea de acci&oacute;n:&nbsp;<strong><?=$linea_accion_escuela[0]->linea_accion_nombre?></strong>&nbsp;&nbsp;&nbsp;Mes:&nbsp;<strong><?=$linea_accion_escuela[0]->mes_descripcion?>&nbsp;del&nbsp;<?=$linea_accion_escuela[0]->anio?></strong></span>");
        $("#extraContentHeader").append(sp);
	});
</script>