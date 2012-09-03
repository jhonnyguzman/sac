
		<?php if(isset($lineas_accion) && is_array($lineas_accion) && count($lineas_accion)>0):?>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Descripcion</th>
						<th>Habilitado</th>
						<th>Ciclo</th>
						<th></th>
					</tr>
				</thead>
				<tbodoy>
					<?php foreach($lineas_accion as $f):?>
						<tr>
							<td><?=$f->nombre?></td>
							<td><?=$f->descripcion?></td>
							<td>
								<?php if($f->habilitado == 1):  ?>
									<span class="label label-success">Habilitado</span>
								<?php elseif($f->habilitado == 0):  ?>
									<span class="label">Desabilitado</span>
								<?php endif;  ?>
							</td>
							<td><?=$f->ciclo?></td>
							<td>
								<?php if($flag['u']):?>
									<a href="<?=base_url()?>lineas_accion_controller/edit_c/<?=$f->id?>" title="Modificar">Modificar</a>
								<?php endif;?>
								<?php if($flag['d']):?>
									<a href="#"  onClick="deleteRow('<?=base_url()?>lineas_accion_controller/delete_c/<?=$f->id?>')" title="Eliminar">Eliminar</a>
								<?php endif;?>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
			
			<?php if(isset($pagination)):?>
				<div class="pagination pagination-right" id="pag-lineas_accion">
					<?=$pagination?>
				</div>
			<?php endif; ?>
		<?php else: ?>
			<p>No results!</p>
		<?php endif; ?>

<script>
	$(document).ready(function(){ 
		setPagination('pag-lineas_accion','result-list'); 
	});
</script>