
		<?php if(isset($titulos) && is_array($titulos) && count($titulos)>0):?>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Tipo</th>
						<th></th>
					</tr>
				</thead>
				<tbodoy>
					<?php foreach($titulos as $f):?>
						<tr>
							<td><?=$f->nombre?></td>
							<td><?=$f->tipo_descripcion?></td>
							<td>
								<?php if($flag['u']):?>
									<a href="<?=base_url()?>titulos_controller/edit_c/<?=$f->id?>" title="Modificar" class="btn boton_rojo">Modificar</a>
								<?php endif;?>
								<?php if($flag['d']):?>
									<a href="#"  onClick="deleteRow('<?=base_url()?>titulos_controller/delete_c/<?=$f->id?>')" title="Eliminar" class="btn boton_rojo">Eliminar</a>
								<?php endif;?>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
			
			<?php if(isset($pagination)):?>
				<div class="pagination pagination-right" id="pag-titulos">
					<?=$pagination?>
				</div>
			<?php endif; ?>
		<?php else: ?>
			<p>No results!</p>
		<?php endif; ?>

<script>
	$(document).ready(function(){ 
		setPagination('pag-titulos','result-list'); 
	});
</script>