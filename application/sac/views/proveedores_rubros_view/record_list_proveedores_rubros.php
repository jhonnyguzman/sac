
		<?php if(isset($proveedores_rubros) && is_array($proveedores_rubros) && count($proveedores_rubros)>0):?>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Id</th>
						<th>Rubro</th>
						<th></th>
					</tr>
				</thead>
				<tbodoy>
					<?php foreach($proveedores_rubros as $f):?>
						<tr>
							<td><?=$f->id?></td>
							<td><?=$f->rubro_nombre?></td>
							<td>
								<?php if($flag['d']):?>
									<a href="#"  onClick="deleteItemModal('<?=base_url()?>proveedores_rubros_controller/delete_c/<?=$f->id?>/<?=$f->proveedor_id?>','contentModal')" title="Eliminar" >Eliminar</a>
								<?php endif;?>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
			
			<?php if(isset($pagination)):?>
				<div class="pagination pagination-right" id="pag-proveedores_rubros">
					<?=$pagination?>
				</div>
			<?php endif; ?>
		<?php else: ?>
			<p>No results!</p>
		<?php endif; ?>

<script>
	$(document).ready(function(){ 
		setPagination('pag-proveedores_rubros','result-list'); 
	});
</script>

