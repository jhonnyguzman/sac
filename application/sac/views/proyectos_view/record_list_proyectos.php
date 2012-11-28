
		<?php if(isset($proyectos) && is_array($proyectos) && count($proyectos)>0):?>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Id</th>
						<th>Nombre</th>
						<th>Descripci&oacute;n</th>
						<th>Linea</th>
						<th>Estado</th>
						<th></th>
					</tr>
				</thead>
				<tbodoy>
					<?php foreach($proyectos as $f):?>
						<tr>
							<td><?=$f->id?></td>
							<td><?=$f->nombre?></td>
							<td><?=$f->descripcion?></td>
							<td><?=$f->nombre?></td>
							<td>
								<?php if($f->habilitado == 1):  ?>
									<span class="label label-success">Habilitado</span>
								<?php elseif($f->habilitado == 0):  ?>
									<span class="label">Desabilitado</span>
								<?php endif;  ?>
							</td>
							<td>
								<div class="btn-group">
								  <a class="btn btn-link dropdown-toggle" data-toggle="dropdown" href="#">
								    Acciones
								    <span class="caret"></span>
								  </a>
								  <ul class="dropdown-menu">
										<?php if($flag['u']):?>
											<li><a href="<?=base_url()?>proyectos_controller/edit_c/<?=$f->id?>" title="Modificar" ><i class="icon-pencil"></i> Modificar</a></li>
										<?php endif;?>
										<?php if($flag['d']):?>
											<li><a href="#"  onClick="deleteRow('<?=base_url()?>proyectos_controller/delete_c/<?=$f->id?>')" title="Eliminar" ><i class="icon-trash"></i> Eliminar</a></li>
										<?php endif;?>
										<li><a href="javascript:void(0)" onClick="loadModal('<?=base_url()?>proyectos_personas_controller/showModal_c/<?=$f->id?>','myModal')"><i class="icon-align-justify"></i> Personas</a></li>
										<li><a href="javascript:void(0)" onClick="loadModal('<?=base_url()?>eventos_controller/showModal_c/<?=$f->id?>','myModal')"><i class="icon-align-justify"></i> Eventos</a></li>
								  </ul>
								</div>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
			
			<?php if(isset($pagination)):?>
				<div class="pagination pagination-right" id="pag-proyectos">
					<?=$pagination?>
				</div>
			<?php endif; ?>
		<?php else: ?>
			<p>No results!</p>
		<?php endif; ?>

		<div class="modal hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

<script>
	$(document).ready(function(){ 
		setPagination('pag-proyectos','result-list'); 
	});
</script>


