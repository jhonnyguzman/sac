<?php if(isset($perfiles_asignados) && is_array($perfiles_asignados) && count($perfiles_asignados)>0):?>
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Id</th>
				<th>Nombre</th>
				<th>Cantidad de horas</th>
				<th></th>
			</tr>
		</thead>
		<tbodoy>
			<?php foreach($perfiles_asignados as $f):?>
				<tr>
					<td><?=$f->id?></td>
					<td><?=$f->nombre?></td>
					<td><?=$f->cantidad_hora?></td>
					<td>
						<a href="#" onClick="deleteItemModal('<?=base_url()?>docentes_perfiles_controller/delete_c/<?=$f->id?>/<?=$f->docente_id?>','contentModal')">Eliminar</a>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	
<?php else: ?>
	<p>No results!</p>
<?php endif; ?>