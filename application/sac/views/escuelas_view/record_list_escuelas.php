
		<?php if(isset($escuelas) && is_array($escuelas) && count($escuelas)>0):?>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Cue</th>
						<th>Nombre</th>
						<th>Tel&oacute;fono</th>
						<th>Email</th>
						<th></th>
					</tr>
				</thead>
				<tbodoy>
					<?php foreach($escuelas as $f):?>
						<tr>
							<td><?=$f->cue?></td>
							<td><?=$f->nombre?></td>
							<td><?=$f->telefono?></td>
							<td><?=$f->email?></td>
							<td>
								<?php if($flag['u']):?>
									<a href="<?=base_url()?>escuelas_controller/edit_c/<?=$f->id?>" title="Modificar">Modificar</a>
								<?php endif;?>
								<?php if($flag['d']):?>
									<a href="#"  onClick="deleteRow('<?=base_url()?>escuelas_controller/delete_c/<?=$f->id?>')" title="Eliminar">Eliminar</a>
								<?php endif;?>
									<a href="javascript:void(0)" onClick="loadModal('<?=base_url()?>periodos_escuelas_controller/showModal_c/<?=$f->id?>')">Periodos</a>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
			
			<?php if(isset($pagination)):?>
				<div class="pagination pagination-right" id="pag-escuelas">
					<?=$pagination?>
				</div>
			<?php endif; ?>
		<?php else: ?>
			<p>No results!</p>
		<?php endif; ?>


<div class="modal hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

</div>

<script>
	$(document).ready(function(){ 
		setPagination('pag-escuelas','result-list'); 
	});
</script>