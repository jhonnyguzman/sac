		<?php if(isset($menusinasignar) && is_array($menusinasignar) && count($menusinasignar)>0):?>
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
					<?php foreach($menusinasignar as $f):?>
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
								<?php if($flag['i']):?>
									<a href="#" onClick="asignMenu('<?=base_url()?>sisperfil_controller/add_c/<?=$f->id?>/')" title="Asignar">Asignar</a>
								<?php endif;?>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
			
		<?php else: ?>
			<p>No results!</p>
		<?php endif; ?>
