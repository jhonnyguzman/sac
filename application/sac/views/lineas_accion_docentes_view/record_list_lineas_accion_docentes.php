<?php if(isset($lineas_accion_docentes) && is_array($lineas_accion_docentes) && count($lineas_accion_docentes)>0):?>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Id</th>
				<th>Docente</th>
				<th>Perfil</th>
				<th>Cantidad de horas</th>
				<th></th>
			</tr>
		</thead>
		<tbodoy>
			<?php foreach($lineas_accion_docentes as $f):?>
				<tr>
					<td><?=$f->id?></td>
					<td><?=$f->docente_apellido." ".$f->docente_nombre?></td>
					<td><?=$f->perfil_nombre?></td>
					<td><?=$f->cantidad_horas?></td>
					<td>

						<?php if($flag['u']):?>
							<a href="#" onClick="updateContent('<?=base_url()?>lineas_accion_docentes_controller/edit_c/<?=$f->id?>/<?=$f->linea_accion_escuela_id?>','contentModal')" title="Modificar">Modificar</a>
						<?php endif;?>
						<?php if($flag['d']):?>
							<a href="#"  onClick="deleteItemModal('<?=base_url()?>lineas_accion_docentes_controller/delete_c/<?=$f->id?>/<?=$f->linea_accion_escuela_id?>','contentModal')" title="Eliminar">Eliminar</a>
						<?php endif;?>
						   
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	
	<?php if(isset($pagination)):?>
		<div class="pagination pagination-right" id="pag-lineas_accion_docentes">
			<?=$pagination?>
		</div>
	<?php endif; ?>
<?php else: ?>
	<p>No results!</p>
<?php endif; ?>

<script>
	$(document).ready(function(){ 
		setPagination('pag-lineas_accion_docentes','result-list'); 
	});
</script>
