
		<?php if(isset($syspermisos) && is_array($syspermisos) && count($syspermisos)>0):?>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Tabla</th>
						<th>Perfil</th>
						<th>¿Puede leer?</th>
						<th>¿Puede insertar?</th>
						<th>¿Puede editar?</th>
						<th>¿Puede eliminar?</th>
						<th></th>
					</tr>
				</thead>
				<tbodoy>
					<?php foreach($syspermisos as $f):?>
						<tr>
							<td><?=$f->tabla?></td>
							<td><?=$f->perfil_descripcion?></td>
							<td>
								<?php if($f->flag_read == 1 ): ?>
									<img src="..." class="icon-ok">
								<?php elseif($f->flag_read == 0 ): ?>
									<img src="..." class="icon-remove">
								<?php endif; ?>
							</td>
							<td>
								<?php if($f->flag_insert == 1 ): ?>
									<img src="..." class="icon-ok">
								<?php elseif($f->flag_insert == 0 ): ?>
									<img src="..." class="icon-remove">
								<?php endif; ?>
							</td>
							<td>
								<?php if($f->flag_update == 1 ): ?>
									<img src="..." class="icon-ok">
								<?php elseif($f->flag_update == 0 ): ?>
									<img src="..." class="icon-remove">
								<?php endif; ?>
							</td>
							<td>
								<?php if($f->flag_delete == 1 ): ?>
									<img src="..." class="icon-ok">
								<?php elseif($f->flag_delete == 0 ): ?>
									<img src="..." class="icon-remove">
								<?php endif; ?>
							</td>
							<td>
								<?php if($flag['u']):?>
									<a href="<?=base_url()?>sispermisos_controller/edit_c/<?=$f->id?>" title="Modificar">Modificar</a>
								<?php endif;?>
								<?php if($flag['d']):?>
									<a href="#"  onClick="deleteRow('<?=base_url()?>sispermisos_controller/delete_c/<?=$f->id?>')" title="Eliminar">Eliminar</a>
								<?php endif;?>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
			
			<?php if(isset($pagination)):?>
				<div class="pagination pagination-right" id="pag-syspermisos">
					<?=$pagination?>
				</div>
			<?php endif; ?>
		<?php else: ?>
			<p>No results!</p>
		<?php endif; ?>

<script>
	$(document).ready(function(){ 
		setPagination('pag-syspermisos','result-list'); 
	});
</script>

