
		<?php if(isset($docentes) && is_array($docentes) && count($docentes)>0):?>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>DNI</th>
						<th>Apellido</th>
						<th>Nombre</th>
						<th>Telefono</th>
						<th></th>
					</tr>
				</thead>
				<tbodoy>
					<?php foreach($docentes as $f):?>
						<tr>
							<td><?=$f->dni?></td>
							<td><?=$f->apellido?></td>
							<td><?=$f->nombre?></td>
							<td><?=$f->telefono?></td>
							<td>
								<?php if($flag['u']):?>
									<a href="<?=base_url()?>docentes_controller/edit_c/<?=$f->id?>" title="Modificar">Modificar</a>
								<?php endif;?>
								<?php if($flag['d']):?>
									<a href="#"  onClick="deleteRow('<?=base_url()?>docentes_controller/delete_c/<?=$f->id?>')" title="Eliminar">Eliminar</a>
								<?php endif;?>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
			
			<?php if(isset($pagination)):?>
				<div class="pagination pagination-right" id="pag-docentes">
					<?=$pagination?>
				</div>
			<?php endif; ?>
		<?php else: ?>
			<p>No results!</p>
		<?php endif; ?>

<script>
	$(document).ready(function(){ 
		setPagination('pag-docentes','result-list'); 
	});
</script>