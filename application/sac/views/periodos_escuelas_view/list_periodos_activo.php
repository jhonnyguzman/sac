<?php if(isset($periodos_activos) && is_array($periodos_activos) && count($periodos_activos)>0):?>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Periodo</th>
				<th>Matricula</th>
				<th>Resol.</th>
				<th>Cant. horas</th>
				<th></th>
			</tr>
		</thead>
		<tbodoy>
			<?php foreach($periodos_activos as $f):?>
				<tr>
					<td><?="De <strong>".$f->periodo_fecha_inicio."</strong> a <strong>".$f->periodo_fecha_fin."</strong>"?></td>
					<td><?=$f->matricula?></td>
					<td><?=$f->resolucion?></td>
					<td><?=$f->cantidad_horas?></td>
					<td>
						<a href="#" onClick="deletePeriodoActivo('<?=base_url()?>periodos_escuelas_controller/delete_c/<?=$f->id?>/<?=$f->escuelas_id?>','contentModal')">Eliminar</a>
						<a href="#" onClick="updateContent('<?=base_url()?>periodos_escuelas_controller/edit_c/<?=$f->id?>','contentModal')">Modificar</a>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	
<?php else: ?>
	<p>No results!</p>
<?php endif; ?>