
		<?php if(isset($contratados) && is_array($contratados) && count($contratados)>0):?>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Persona Id</th>
						<th>Fecha de Inicio</th>
						<th>Fecha de Fin</th>
						<th>Monto Total</th>
						<th>Cantidad de horas</th>
						<th>Funcion</th>
						<th>Estado</th>
						<th></th>
					</tr>
				</thead>
				<tbodoy>
					<?php foreach($contratados as $f):?>
						<tr>
							<td><?=$f->persona_id?></td>
							<td><?=$f->fecha_inicio?></td>
							<td><?=$f->fecha_fin?></td>
							<td><?=$f->monto_total?></td>
							<td><?=$f->cantidad_horas?></td>
							<td><?=$f->funcion?></td>
							<td>
								<?php if($f->habilitado == 1):  ?>
									<span class="label label-success">Habilitado</span>
								<?php elseif($f->habilitado == 0):  ?>
									<span class="label">Desabilitado</span>
								<?php endif;  ?>
							</td>
							<td>
								<?php if($flag['u']):?>
									<a href="<?=base_url()?>contratados_controller/edit_c/<?=$f->id?>" title="Modificar" >Modificar</a>
								<?php endif;?>
								<?php if($flag['d']):?>
									<a href="#"  onClick="deleteRow('<?=base_url()?>contratados_controller/delete_c/<?=$f->id?>')" title="Eliminar" >Eliminar</a>
								<?php endif;?>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
			
			<?php if(isset($pagination)):?>
				<div class="pagination pagination-right" id="pag-contratados">
					<?=$pagination?>
				</div>
			<?php endif; ?>
		<?php else: ?>
			<p>No results!</p>
		<?php endif; ?>

<script>
	$(document).ready(function(){ 
		setPagination('pag-contratados','result-list'); 
	});
</script>