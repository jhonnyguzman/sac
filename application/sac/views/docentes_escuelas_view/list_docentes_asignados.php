<?php if(isset($docentes_asignados) && is_array($docentes_asignados) && count($docentes_asignados)>0):?>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Id</th>
				<th>Docente</th>
				<th></th>
			</tr>
		</thead>
		<tbodoy>
			<?php foreach($docentes_asignados as $f):?>
				<tr>
					<td><?=$f->id?></td>
					<td><?=$f->apellido." ".$f->nombre?></td>
					<td>
						<a href="#" onClick="deleteItemModal('<?=base_url()?>docentes_escuelas_controller/delete_c/<?=$f->id?>/<?=$escuela_id?>','contentModal')">Eliminar</a>
						<a href="#" onClick="updateContent('<?=base_url()?>docentes_escuelas_controller/edit_c/<?=$f->id?>','contentModal')">Modificar</a>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	
<?php else: ?>
	<p>No results!</p>
<?php endif; ?>