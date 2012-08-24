
		<?php if(isset($circuitos) && is_array($circuitos) && count($circuitos)>0):?>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Estado</th>
						<th></th>
					</tr>
				</thead>
				<tbodoy>
					<?php foreach($circuitos as $f):?>
						<tr>
							<td><?=$f->nombre?></td>
							<td><?=$f->habilitado?></td>
							<td>
								<?php if($flag['u']):?>
									<a href="<?=base_url()?>circuitos_controller/edit_c/<?=$f->id?>" title="Modificar">Modificar</a>
								<?php endif;?>
								<?php if($flag['d']):?>
									<a href="#"  onClick="deleteRow('<?=base_url()?>circuitos_controller/delete_c/<?=$f->id?>')" title="Eliminar">Eliminar</a>
								<?php endif;?>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
			
			<?php if(isset($pagination)):?>
				<div class="pagination pagination-right" id="pag-circuitos">
					<?=$pagination?>
				</div>
			<?php endif; ?>
		<?php else: ?>
			<p>No results!</p>
		<?php endif; ?>

<script>
	$(document).ready(function(){ 
		setPagination('pag-circuitos','result-list'); 
	});
</script>