
		<?php if(isset($fuentes_lineas) && is_array($fuentes_lineas) && count($fuentes_lineas)>0):?>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Id</th>
						<th>Año</th>
						<th>Monto Global</th>
						<th>Monto Especial</th>
						<th>Estado</th>
						<th></th>
					</tr>
				</thead>
				<tbodoy>
					<?php foreach($fuentes_lineas as $f):?>
						<tr>
							<td><?=$f->id?></td>
							<td><?=$f->anio?></td>
							<td>$ <?=$f->monto_global?></td>
							<td>$ <?=$f->monto_especial?></td>
							<td>
								<?php if($f->estado == 12):  ?>
									<span class="label label-success"><?=$f->estado_descripcion?></span>
								<?php elseif($f->estado == 13):  ?>
									<span class="label"><?=$f->estado_descripcion?></span>
								<?php endif;  ?>
							</td>
							<td>
								<?php if($flag['u']):?>
									<a href="#" title="Modificar" 
										onClick="updateContent('<?=base_url()?>fuentes_lineas_controller/edit_c/<?=$f->id?>/<?=$f->fuente_id?>','contentModal')">Modificar</a>
								<?php endif;?>
								<?php if($flag['d']):?>
									<a href="#"  onClick="deleteItemModal('<?=base_url()?>fuentes_lineas_controller/delete_c/<?=$f->id?>/<?=$f->fuente_id?>','contentModal')" title="Eliminar" >Eliminar</a>
								<?php endif;?>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
			
			<?php if(isset($pagination)):?>
				<div class="pagination pagination-right" id="pag-fuentes_lineas">
					<?=$pagination?>
				</div>
			<?php endif; ?>
		<?php else: ?>
			<p>No results!</p>
		<?php endif; ?>

<script>
	$(document).ready(function(){ 
		setPagination('pag-fuentes_lineas','result-list'); 
	});
</script>


