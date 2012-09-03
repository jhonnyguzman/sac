<?php if(isset($periodos) && is_array($periodos) && count($periodos)>0):?>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Fecha de inicio</th>
				<th>Fecha de fin</th>
				<th>Costo por hora</th>
				<th>Estado</th>
				<th></th>
			</tr>
		</thead>
		<tbodoy>
			<?php foreach($periodos as $f):?>
				<tr>
					<td><?=$f->fecha_inicio?></td>
					<td><?=$f->fecha_fin?></td>
					<td><?=$f->costo_hora?></td>
					<td>
						<span class="label label-success"><?=$f->estado_descripcion?></span>					
					</td>
					<td>
						<a href="#" onClick="updateContent('<?=base_url()?>periodos_escuelas_controller/add_c/<?=$f->id?>/<?=$escuela_id?>','contentModal')">Asignar</a>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	
<?php else: ?>
	<p>No results!</p>
<?php endif; ?>

