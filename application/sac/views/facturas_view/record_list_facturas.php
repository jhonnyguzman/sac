
		<?php if(isset($facturas) && is_array($facturas) && count($facturas)>0):?>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Nro</th>
						<th>Fecha</th>
						<th>Monto</th>
						<th>Estado</th>
						<th>Obs.</th>
						<th>Proveedor</th>
						<th></th>
					</tr>
				</thead>
				<tbodoy>
					<?php foreach($facturas as $f):?>
						<tr>
							<td><?=$f->nro_factura?></td>
							<td><?=$f->fecha?></td>
							<td><?=$f->monto?></td>
							<td><?=$f->estado_descripcion?></td>
							<td><?=$f->observacion?></td>
							<td><?=$f->proveedor_razon_social?></td>
							<td>
								<?php if($flag['u']):?>
									<a href="<?=base_url()?>facturas_controller/edit_c/<?=$f->id?>" title="Modificar" >Modificar</a>
								<?php endif;?>
								<?php if($flag['d']):?>
									<a href="#"  onClick="deleteRow('<?=base_url()?>facturas_controller/delete_c/<?=$f->id?>')" title="Eliminar" >Eliminar</a>
								<?php endif;?>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
			
			<?php if(isset($pagination)):?>
				<div class="pagination pagination-right" id="pag-facturas">
					<?=$pagination?>
				</div>
			<?php endif; ?>
		<?php else: ?>
			<p>No results!</p>
		<?php endif; ?>

<script>
	$(document).ready(function(){ 
		setPagination('pag-facturas','result-list'); 
	});
</script>

