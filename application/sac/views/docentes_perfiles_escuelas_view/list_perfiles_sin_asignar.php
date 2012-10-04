<?php if(isset($perfiles_sin_asignar) && is_array($perfiles_sin_asignar) && count($perfiles_sin_asignar)>0):?>
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
			<?php foreach($perfiles_sin_asignar as $f):?>
				<tr>
					<td><?=$f->id?></td>
					<td><?=$f->nombre?></td>
					<td><?=$f->cantidad_hora?></td>
					<td>
						<a href="#" onClick="updateContent('<?=base_url()?>docentes_perfiles_controller/add_c/<?=$f->id?>/<?=$docente_id?>','contentModal')">Asignar</a>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	
<?php else: ?>
	<p>No results!</p>
<?php endif; ?>