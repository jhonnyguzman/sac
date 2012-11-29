
		<?php if(isset($fuentes) && is_array($fuentes) && count($fuentes)>0):?>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Id</th>
						<th>Nombre</th>
						<th></th>
					</tr>
				</thead>
				<tbodoy>
					<?php foreach($fuentes as $f):?>
						<tr>
							<td><?=$f->id?></td>
							<td><?=$f->nombre?></td>
							<td>
								<?php if($flag['u']):?>
									<a href="<?=base_url()?>fuentes_controller/edit_c/<?=$f->id?>" title="Modificar" >Modificar</a>
								<?php endif;?>
								<?php if($flag['d']):?>
									<a href="#"  onClick="deleteRow('<?=base_url()?>fuentes_controller/delete_c/<?=$f->id?>')" title="Eliminar" >Eliminar</a>
								<?php endif;?>
								<a href="javascript:void(0)" onClick="loadModal('<?=base_url()?>fuentes_rubros_controller/showModal_c/<?=$f->id?>','myModal')">Rubros</a>
								<a href="javascript:void(0)" onClick="loadModal('<?=base_url()?>fuentes_lineas_controller/showModal_c/<?=$f->id?>','myModal')">Lineas</a>
							</td>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
			
			<?php if(isset($pagination)):?>
				<div class="pagination pagination-right" id="pag-fuentes">
					<?=$pagination?>
				</div>
			<?php endif; ?>
		<?php else: ?>
			<p>No results!</p>
		<?php endif; ?>

		<div class="modal hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

<script>
	$(document).ready(function(){ 
		setPagination('pag-fuentes','result-list'); 
	});
</script>


