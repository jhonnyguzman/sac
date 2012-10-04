
		<?php if(isset($perfiles) && is_array($perfiles) && count($perfiles)>0):?>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Descripci&oacute;n</th>
						<th>Estado</th>
						<th></th>
					</tr>
				</thead>
				<tbodoy>
					<?php foreach($perfiles as $f):?>
						<tr>
							<td><?=$f->descripcion?></td>
							<td><?=$f->estado_descripcion?></td>
							<td>
								<?php if($flag['u']):?>
									<a href="<?=base_url()?>sys_perfiles_controller/edit_c/<?=$f->id?>" title="Modificar">Modificar</a>
								<?php endif;?>
								<?php if($flag['d']):?>
									<a href="#"  onClick="deleteRow('<?=base_url()?>sys_perfiles_controller/delete_c/<?=$f->id?>')" title="Eliminar">Eliminar</a>
								<?php endif;?>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
			
			<?php if(isset($pagination)):?>
				<div class="pagination pagination-right" id="pag-perfiles">
					<?=$pagination?>
				</div>
			<?php endif; ?>
		<?php else: ?>
			<p>No results!</p>
		<?php endif; ?>

<script>
	$(document).ready(function(){ 
		setPagination('pag-perfiles','result-list'); 
	});
</script>
