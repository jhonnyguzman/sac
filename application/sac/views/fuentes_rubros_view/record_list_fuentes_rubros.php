
		<?php if(isset($fuentes_rubros) && is_array($fuentes_rubros) && count($fuentes_rubros)>0):?>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Id</th>
						<th>Rubro Id</th>
						<th></th>
					</tr>
				</thead>
				<tbodoy>
					<?php foreach($fuentes_rubros as $f):?>
						<tr>
							<td><?=$f->id?></td>
							<td><?=$f->rubro_nombre?></td>
							<td>
								<?php if($flag['d']):?>
									<a href="#"  onClick="deleteItemModal('<?=base_url()?>fuentes_rubros_controller/delete_c/<?=$f->id?>/<?=$f->fuente_id?>/','contentModal')" title="Eliminar" >Eliminar</a>
								<?php endif;?>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
			
			<?php if(isset($pagination)):?>
				<div class="pagination pagination-right" id="pag-fuentes_rubros">
					<?=$pagination?>
				</div>
			<?php endif; ?>
		<?php else: ?>
			<p>No results!</p>
		<?php endif; ?>

<script>
	$(document).ready(function(){ 
		setPagination('pag-fuentes_rubros','result-list'); 
	});
</script>


