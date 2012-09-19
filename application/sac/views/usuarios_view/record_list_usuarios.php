
		<?php if(isset($usuarios) && is_array($usuarios) && count($usuarios)>0):?>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Username</th>
						<th>Perfil</th>
						<th></th>
					</tr>
				</thead>
				<tbodoy>
					<?php foreach($usuarios as $f):?>
						<tr>
							<td><?=$f->username?></td>
							<td><?=$f->perfiles_descripcion?></td>
							<td>
								<?php if($flag['u']):?>
									<a href="<?=base_url()?>usuarios_controller/edit_c/<?=$f->id?>" title="Modificar" class="btn boton_rojo">Modificar</a>
								<?php endif;?>
								<?php if($flag['d']):?>
									<a href="#"  onClick="deleteRow('<?=base_url()?>usuarios_controller/delete_c/<?=$f->id?>')" title="Eliminar" class="btn boton_rojo">Eliminar</a>
								<?php endif;?>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
			
			<?php if(isset($pagination)):?>
				<div class="pagination pagination-right" id="pag-users">
					<?=$pagination?>
				</div>
			<?php endif; ?>
		<?php else: ?>
			<p>No results!</p>
		<?php endif; ?>

<script>
	$(document).ready(function(){ 
		setPagination('pag-users','result-list'); 
	});
</script>

