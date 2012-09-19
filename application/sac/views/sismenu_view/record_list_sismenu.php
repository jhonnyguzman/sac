
		<?php if(isset($sismenu) && is_array($sismenu) && count($sismenu)>0):?>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Descripci&oacute;n</th>
						<th>Menu Padre</th>
						<th>Estado</th>
						<th>Link</th>
						<th></th>
					</tr>
				</thead>
				<tbodoy>
					<?php foreach($sismenu as $f):?>
						<tr>
							<td><?=$f->descripcion?></td>
							<td><?=$f->parent_descripcion?></td>
							<td>
								<?php if($f->estado == 1):  ?>
									<span class="label label-success"><?=$f->estado_descripcion?></span>
								<?php elseif($f->estado == 0):  ?>
									<span class="label"><?=$f->estado_descripcion?></span>
								<?php endif;  ?>
							</td>
							<td><?=$f->link?></td>
							<td>
								<?php if($flag['u']):?>
									<a href="<?=base_url()?>sismenu_controller/edit_c/<?=$f->id?>" title="Modificar">Modificar</a>
								<?php endif;?>
								<?php if($flag['d']):?>
									<a href="#"  onClick="deleteRow('<?=base_url()?>sismenu_controller/delete_c/<?=$f->id?>')" title="Eliminar">Eliminar</a>
								<?php endif;?>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
			
			<?php if(isset($pagination)):?>
				<div class="pagination pagination-right" id="pag-sismenu">
					<?=$pagination?>
				</div>
			<?php endif; ?>
		<?php else: ?>
			<p>No results!</p>
		<?php endif; ?>

<script>
	$(document).ready(function(){ 
		setPagination('pag-sismenu','result-list'); 
	});
</script>
