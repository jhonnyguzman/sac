
		<?php if(isset($personas) && is_array($personas) && count($personas)>0):?>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Id</th>
						<th>D.N.I.</th>
						<th>Apellido</th>
						<th>Nombre</th>
						<th>Domicilio</th>
						<th>Tel&eacute;fono</th>
						<th>Email</th>
						<th>Estado</th>
						<th></th>
					</tr>
				</thead>
				<tbodoy>
					<?php foreach($personas as $f):?>
						<tr>
							<td><?=$f->id?></td>
							<td><?=$f->dni?></td>
							<td><?=$f->apellido?></td>
							<td><?=$f->nombre?></td>
							<td><?=$f->domicilio?></td>
							<td><?=$f->telefono?></td>
							<td><?=$f->email?></td>
							<td>
								<?php if($f->habilitado == 1):  ?>
									<span class="label label-success">Habilitado</span>
								<?php elseif($f->habilitado == 0):  ?>
									<span class="label">Desabilitado</span>
								<?php endif;  ?>
							</td>
							<td>
								<?php if($flag['u']):?>
									<a href="<?=base_url()?>personas_controller/edit_c/<?=$f->id?>" title="Modificar" >Modificar</a>
								<?php endif;?>
								<?php if($flag['d']):?>
									<a href="#"  onClick="deleteRow('<?=base_url()?>personas_controller/delete_c/<?=$f->id?>')" title="Eliminar" >Eliminar</a>
								<?php endif;?>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
			
			<?php if(isset($pagination)):?>
				<div class="pagination pagination-right" id="pag-personas">
					<?=$pagination?>
				</div>
			<?php endif; ?>
		<?php else: ?>
			<p>No results!</p>
		<?php endif; ?>

<script>
	$(document).ready(function(){ 
		setPagination('pag-personas','result-list'); 
	});
</script>

