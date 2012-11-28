<?php if($flag['r']): ?>

	<?=$this->load->view("default/_result_messages_modal")?>

	<ul class="nav nav-tabs">
	  <li class="active"><a href="#rubrosAsignados" data-toggle="tab">Rubros Asignados</a></li>
	  <li><a href="#asignarRubro" data-toggle="tab"
	  	onClick="updateContent('<?=base_url()?>eventos_rubros_controller/add_c/<?=$evento[0]->id?>/<?=$proyecto_id?>','asignarRubro')">Asignar</a></li>
	</ul>

	<div class="tab-content">
	  <div class="tab-pane active" id="rubrosAsignados"></div>
	  <div class="tab-pane" id="asignarRubro"></div>
	</div>

	<script type="text/javascript">
		
		$(document).ready(function(){
			$.ajax({
		        type: 'POST',
		        url: '<?=base_url()?>eventos_rubros_controller/search_c/',
		        data: {evento_id: '<?=$evento[0]->id?>', proyecto_id: "<?=$proyecto_id?>"},
		        success: function(data) {
		               $("#rubrosAsignados").html(data);
		        }
	        });

			$("#contentModalFooter").find(".btnBack").remove();
	        var a = $("<a href=\"#\" onClick=\"updateContent('<?=base_url()?>eventos_controller/show_c/<?=$proyecto_id?>','contentModal')\" class=\"btn btn-primary btnBack\">Volver</a> ");  
	        $("#contentModalFooter").append(a);

	        $("#extraContentHeader").find(".extraContentHeaderP").remove();
	        var sp = $("<span class=\"extraContentHeaderP\"><br>Evento:&nbsp;<span class=\"label label-success\" id=\"lblDescripLineaAccion\"><?=$evento[0]->nombre?></span></span>");
	        $("#extraContentHeader").append(sp);
		});
	</script>

<?php else: ?>

	    <div class="alert">
		  <button type="button" class="close" data-dismiss="alert">×</button>
		  <strong>Alerta!</strong> No tienes permiso par realizar esta acción.
		</div>

<?php endif;?>