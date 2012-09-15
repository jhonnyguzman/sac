<?php if(isset($docentes_sin_asignar) && is_array($docentes_sin_asignar) && count($docentes_sin_asignar)>0):?>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Id</th>
				<th>Docente</th>
				<th></th>
			</tr>
		</thead>
		<tbodoy>
			<?php foreach($docentes_sin_asignar as $f):?>
				<tr>
					<td><?=$f->id?></td>
					<td><?=$f->apellido." ".$f->nombre?></td>
					<td>
						<a href="#" onClick="updateContent('<?=base_url()?>docentes_escuelas_controller/add_c/<?=$f->id?>/<?=$escuela_id?>','contentModal')">Asignar</a>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	
<?php else: ?>
	<p>No results!</p>
<?php endif; ?>