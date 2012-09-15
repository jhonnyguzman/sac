
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
								<div class="btn-group">
								  <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								    Acciones
								    <span class="caret"></span>
								  </a>
								  <ul class="dropdown-menu">
								   		<?php if($flag['u']):?>
											<li><a href="<?=base_url()?>escuelas_controller/edit_c/<?=$f->id?>" title="Modificar"><i class="icon-pencil"></i> Modificar</a></li>
										<?php endif;?>
										<?php if($flag['d']):?>
											<li><a href="#" onClick="deleteRow('<?=base_url()?>escuelas_controller/delete_c/<?=$f->id?>')" title="Eliminar"><i class="icon-trash"></i> Eliminar</a></li>
										<?php endif;?>
										<li><a href="javascript:void(0)" onClick="loadModal('<?=base_url()?>periodos_escuelas_controller/showModal_c/<?=$f->id?>','myModal')"><i class="icon-calendar"></i> Periodos</a></li>
										<li><a href="javascript:void(0)" onClick="loadModal('<?=base_url()?>docentes_escuelas_controller/showModal_c/<?=$f->id?>','myModal')"><i class="icon-user"></i> Docentes</a></li>

								  </ul>
								</div>
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
