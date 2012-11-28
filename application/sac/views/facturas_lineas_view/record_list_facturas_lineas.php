
		<?php if(isset($facturas_lineas) && is_array($facturas_lineas) && count($facturas_lineas)>0):?>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Concepto</th>
						<th>Costo</th>
						<th>Cantidad</th>
						<th>Subtotal</th>
						<th>Factura Id</th>
						<th></th>
					</tr>
				</thead>
				<tbodoy>
					<?php foreach($facturas_lineas as $f):?>
						<tr>
							<td><?=$f->concepto?></td>
							<td><?=$f->costo?></td>
							<td><?=$f->cantidad?></td>
							<td><?=$f->subtotal?></td>
							<td><?=$f->factura_id?></td>
							<td>
								<?php if($flag['u']):?>
									<a href="<?=base_url()?>facturas_lineas_controller/edit_c/<?=$f->id?>" title="Modificar" >Modificar</a>
								<?php endif;?>
								<?php if($flag['d']):?>
									<a href="#"  onClick="deleteRow('<?=base_url()?>facturas_lineas_controller/delete_c/<?=$f->id?>')" title="Eliminar" >Eliminar</a>
								<?php endif;?>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
			
			<?php if(isset($pagination)):?>
				<div class="pagination pagination-right" id="pag-facturas_lineas">
					<?=$pagination?>
				</div>
			<?php endif; ?>
		<?php else: ?>
			<p>No results!</p>
		<?php endif; ?>

<script>
	$(document).ready(function(){ 
		setPagination('pag-facturas_lineas','result-list'); 
	});
</script>

