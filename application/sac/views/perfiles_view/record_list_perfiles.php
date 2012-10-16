
		<?php if(isset($perfiles) && is_array($perfiles) && count($perfiles)>0):?>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Descripci&oacute;n</th>
						<th>Cantidad de horas</th>
						<th>Habilitado</th>
						<th></th>
					</tr>
				</thead>
				<tbodoy>
					<?php foreach($perfiles as $f):?>
						<tr>
							<td><?=$f->nombre?></td>
							<td><?=$f->descripcion?></td>
							<td><?=$f->cantidad_hora?></td>
							<td>
								<?php if($f->habilitado == 1):  ?>
									<span class="label label-success">Habilitado</span>
								<?php elseif($f->habilitado == 0):  ?>
									<span class="label">Desabilitado</span>
								<?php endif;  ?>
							</td>
							<td>
								<?php if($flag['u']):?>
									<a href="<?=base_url()?>perfiles_controller/edit_c/<?=$f->id?>" title="Modificar" >Modificar</a>
								<?php endif;?>
								<?php if($flag['d']):?>
									<a href="#"  onClick="deleteRow('<?=base_url()?>perfiles_controller/delete_c/<?=$f->id?>')" title="Eliminar" >Eliminar</a>
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
		setPagination('pag-perfiles','contentsyspermisos'); 
	});
</script>