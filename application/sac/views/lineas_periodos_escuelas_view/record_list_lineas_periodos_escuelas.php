<p>
	<strong>Periodo seleccionado:&nbsp;&nbsp;</strong><?=$periodo_escuela[0]->periodo_fecha_inicio." - ".$periodo_escuela[0]->periodo_fecha_fin?>
	&nbsp;&nbsp;<strong>Estado:&nbsp;&nbsp;</strong>
	<?php if($periodo_escuela[0]->estado == 3):  ?>
		<span class="label label-success"><?=$periodo_escuela[0]->estado_descripcion?></span>
	<?php elseif($periodo_escuela[0]->estado == 4):  ?>
		<span class="label"><?=$periodo_escuela[0]->estado_descripcion?></span>
	<?php endif;  ?>
</p>
<?php if(isset($lineas_periodos_escuelas) && is_array($lineas_periodos_escuelas) && count($lineas_periodos_escuelas)>0):?>
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Año</th>
				<th>Mes</th>
				<th>Horas por mes</th>
				<th>Horas restantes</th>
			</tr>
		</thead>
		<tbodoy>
			<?php $total = 0; foreach($lineas_periodos_escuelas as $f):?>
				<tr>
					<td><?=$f->anio?></td>
					<td><?=$f->mes_descripcion?></td>
					<td><?=$f->horas_por_mes?></td>
					<td><?=$f->horas_restantes?></td>
				</tr>
			<?php $total+=$f->horas_restantes; endforeach; ?>
			<tr class="success">
				<td></td>
				<td></td>
				<td><strong>Total:</strong></td>
				<td><strong><?=$total?></strong></td>
			</tr>
		</tbody>
	</table>
<?php else: ?>
	<p>No results!</p>
<?php endif; ?>

<script type="text/javascript">
	$(document).ready(function(){
		$("#contentModalFooter").find(".btnBack").remove();
        var a = $("<a href=\"#\" onClick=\"updateContent('<?=base_url()?>periodos_escuelas_controller/show_c/<?=$periodo_escuela[0]->escuelas_id?>','contentModal')\" class=\"btn btn-primary btnBack\">Volver</a> ");  
        $("#contentModalFooter").append(a);
	});
</script>