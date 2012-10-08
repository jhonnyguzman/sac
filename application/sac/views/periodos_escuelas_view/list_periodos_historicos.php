<?php if(isset($periodos_historicos) && is_array($periodos_historicos) && count($periodos_historicos)>0):?>
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Periodo</th>
				<th>Matricula</th>
				<th>Resol.</th>
				<th>Cant. horas</th>
				<th>Estado</th>
				<th></th>
			</tr>
		</thead>
		<tbodoy>
			<?php foreach($periodos_historicos as $f):?>
				<tr>
					<td><?="De <strong>".$f->periodo_fecha_inicio."</strong> a <strong>".$f->periodo_fecha_fin."</strong>"?></td>
					<td><?=$f->matricula?></td>
					<td><?=$f->resolucion?></td>
					<td><?=$f->cantidad_horas?></td>
					<td><span class="label"><?=$f->estado_descripcion?></span></td>
					<td><a href="#" onClick="updateContent('<?=base_url()?>lineas_periodos_escuelas_controller/show_c/<?=$f->id?>','contentModal')">Ver Meses</a></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	
<?php else: ?>
	<p>No results!</p>
<?php endif; ?>