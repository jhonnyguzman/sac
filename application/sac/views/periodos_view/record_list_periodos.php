
		<?php if(isset($periodos) && is_array($periodos) && count($periodos)>0):?>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Fecha de inicio</th>
						<th>Fecha de fin</th>
						<th>Costo por hora</th>
						<th>Estado</th>
						<th></th>
					</tr>
				</thead>
				<tbodoy>
					<?php foreach($periodos as $f):?>
						<tr>
							<td><?=$f->fecha_inicio?></td>
							<td><?=$f->fecha_fin?></td>
							<td><?=$f->costo_hora?></td>
							<td>
								<?php if($f->estado == 3):  ?>
									<span class="label label-success"><?=$f->estado_descripcion?></span>
								<?php elseif($f->estado == 4):  ?>
									<span class="label"><?=$f->estado_descripcion?></span>
								<?php endif;  ?>
							</td>
							<td>
								<?php if($flag['u']):?>
									<a href="<?=base_url()?>periodos_controller/edit_c/<?=$f->id?>" title="Modificar" >Modificar</a>
								<?php endif;?>
								<?php if($flag['d']):?>
									<a href="#"  onClick="deleteRow('<?=base_url()?>periodos_controller/delete_c/<?=$f->id?>')" title="Eliminar" >Eliminar</a>
								<?php endif;?>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
			
			<?php if(isset($pagination)):?>
				<div class="pagination pagination-right" id="pag-periodos">
					<?=$pagination?>
				</div>
			<?php endif; ?>
		<?php else: ?>
			<p>No results!</p>
		<?php endif; ?>

<script>
	$(document).ready(function(){ 
		setPagination('pag-periodos','result-list'); 
	});
</script>