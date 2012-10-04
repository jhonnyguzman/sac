
		<?php if(isset($directores) && is_array($directores) && count($directores)>0):?>
			<table class="table table-hover">
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
					<?php foreach($directores as $f):?>
						<tr>
							<td><?=$f->dni?></td>
							<td><?=$f->apellido?></td>
							<td><?=$f->nombre?></td>
							<td><?=$f->telefono?></td>
							<td>
								<?php if($flag['u']):?>
									<a href="<?=base_url()?>directores_controller/edit_c/<?=$f->id?>" title="Modificar" >Modificar</a>
								<?php endif;?>
								<?php if($flag['d']):?>
									<a href="#"  onClick="deleteRow('<?=base_url()?>directores_controller/delete_c/<?=$f->id?>')" title="Eliminar" >Eliminar</a>
								<?php endif;?>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
			
			<?php if(isset($pagination)):?>
				<div class="pagination pagination-right" id="pag-directores">
					<?=$pagination?>
				</div>
			<?php endif; ?>
		<?php else: ?>
			<p>No results!</p>
		<?php endif; ?>

<script>
	$(document).ready(function(){ 
		setPagination('pag-directores','result-list'); 
	});
</script>