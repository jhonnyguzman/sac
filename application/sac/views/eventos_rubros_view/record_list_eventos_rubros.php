
		<?php if(isset($eventos_rubros) && is_array($eventos_rubros) && count($eventos_rubros)>0):?>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Id</th>
						<th>Rubro</th>
						<th></th>
					</tr>
				</thead>
				<tbodoy>
					<?php foreach($eventos_rubros as $f):?>
						<tr>
							<td><?=$f->id?></td>
							<td><?=$f->rubro_nombre?></td>
							<td>
								<?php if($flag['d']):?>
									<a href="#"  onClick="deleteItemModal('<?=base_url()?>eventos_rubros_controller/delete_c/<?=$f->id?>/<?=$f->evento_id?>/<?=$proyecto_id?>','contentModal')" title="Eliminar" >Eliminar</a>
								<?php endif;?>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
			
			<?php if(isset($pagination)):?>
				<div class="pagination pagination-right" id="pag-eventos_rubros">
					<?=$pagination?>
				</div>
			<?php endif; ?>
		<?php else: ?>
			<p>No results!</p>
		<?php endif; ?>

<script>
	$(document).ready(function(){ 
		setPagination('pag-eventos_rubros','result-list'); 
	});
</script>

