
		<?php if(isset($menuasignados) && is_array($menuasignados) && count($menuasignados)>0):?>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Id</th>
						<th>Descripci&oacute;n</th>
						<th>Estado</th>
						<th></th>
					</tr>
				</thead>
				<tbodoy>
					<?php foreach($menuasignados as $f):?>
						<tr>
							<td><?=$f->id?></td>
							<td><?=$f->descripcion?></td>
							<td>
								<?php if($f->estado == 1):  ?>
									<span class="label label-success"><?=$f->estado_descripcion?></span>
								<?php elseif($f->estado == 0):  ?>
									<span class="label"><?=$f->estado_descripcion?></span>
								<?php endif;  ?>
							</td>
							<td>
								<?php if($flag['d']):?>
									<a href="#"  onClick="deleteRow('<?=base_url()?>sisperfil_controller/delete_c/<?=$f->id?>')" title="Quitar menu">Quitar</a>
								<?php endif;?>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
			
		<?php else: ?>
			<p>No results!</p>
		<?php endif; ?>
