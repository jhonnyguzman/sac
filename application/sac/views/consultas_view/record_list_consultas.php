
		<?php if(isset($consultas) && is_array($consultas) && count($consultas)>0):?>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Circuito</th>
						<th>Dpto.</th>
						<th>Localidad</th>
						<th>Escuela</th>
						<th>Periodo</th>
						<th>Mes</th>
						<th>Resolución</th>
						<th>Costo/Hora</th>
						<th>Docente</th>
						<th>DNI</th>
						<th>Perfil</th>
						<th>Linea de acción</th>
						<th>Cantidad de horas</th>
						<th></th>
					</tr>
				</thead>
				<tbodoy>
					<?php foreach($consultas as $f):?>
						<tr>
							<td><?=$f->circuito_nombre?></td>
							<td><?=$f->departamento_nombre?></td>
							<td><?=$f->localidad_nombre?></td>
							<td><?=$f->escuela_nombre?></td>
							<td><?=$f->periodo_fecha_inicio." - ".$f->periodo_fecha_fin?></td>
							<td><?=$f->mes_descripcion?></td>
							<td><?=$f->resolucion?></td>
							<td>$&nbsp;<?=$f->periodo_costo_hora?></td>
							<td><strong><?=$f->docente_apellido." ".$f->docente_nombre?></strong></td>
							<td><?=$f->docente_dni?></td>
							<td><?=$f->perfil_nombre?></td>
							<td><?=$f->linea_accion_nombre?></td>
							<td><?=$f->linea_accion_docente_cantidad_horas?></td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
			
			<?php if(isset($pagination)):?>
				<div class="pagination pagination-right" id="pag-consultas">
					<?=$pagination?>
				</div>
			<?php endif; ?>
		<?php else: ?>
			<p>No results!</p>
		<?php endif; ?>

<script>
	$(document).ready(function(){ 
		setPagination('pag-consultas','result-list'); 
	});
</script>