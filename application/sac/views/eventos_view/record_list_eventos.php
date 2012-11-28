
		<?php if(isset($eventos) && is_array($eventos) && count($eventos)>0):?>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Fecha</th>
						<th>Lugar</th>
						<th>Cant. de Asistentes</th>
						<th>Monto Total</th>
						<th></th>
					</tr>
				</thead>
				<tbodoy>
					<?php foreach($eventos as $f):?>
						<tr>
							<td><?=$f->nombre?></td>
							<td><?=$f->fecha?></td>
							<td><?=$f->lugar?></td>
							<td><?=$f->cantidad_asistentes?></td>
							<td><?=$f->monto_total?></td>
							<td>
								<?php if($flag['u']):?>
									<a href="#" onClick="updateContent('<?=base_url()?>eventos_controller/edit_c/<?=$f->id?>/<?=$f->proyecto_id?>','contentModal')" title="Modificar" >Modificar</a>
								<?php endif;?>
								<?php if($flag['d']):?>
									<a href="#"  onClick="deleteItemModal('<?=base_url()?>eventos_controller/delete_c/<?=$f->id?>/<?=$f->proyecto_id?>','contentModal')" title="Eliminar" >Eliminar</a>
								<?php endif;?>
								<a href="#" onClick="updateContent('<?=base_url()?>eventos_rubros_controller/show_c/<?=$f->id?>/<?=$f->proyecto_id?>','contentModal')" title="Rubros">Rubros</a>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
			
			<?php if(isset($pagination)):?>
				<div class="pagination pagination-right" id="pag-eventos">
					<?=$pagination?>
				</div>
			<?php endif; ?>
		<?php else: ?>
			<p>No results!</p>
		<?php endif; ?>

<script>
	$(document).ready(function(){ 
		setPagination('pag-eventos','result-list'); 
	});
</script>
