
		<?php if(isset($proyectos_personas) && is_array($proyectos_personas) && count($proyectos_personas)>0):?>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Id</th>
						<th>Persona</th>
						<th></th>
					</tr>
				</thead>
				<tbodoy>
					<?php foreach($proyectos_personas as $f):?>
						<tr>
							<td><?=$f->id?></td>
							<td><?=$f->persona_apellido." ".$f->persona_nombre?></td>
							<td>
								<?php if($flag['u']):?>
									<a href="#" onClick="updateContent('<?=base_url()?>proyectos_personas_controller/edit_c/<?=$f->id?>/<?=$f->proyecto_id?>','contentModal')" title="Modificar" >Modificar</a>
								<?php endif;?>
								<?php if($flag['d']):?>
									<a href="#"  onClick="deleteItemModal('<?=base_url()?>proyectos_personas_controller/delete_c/<?=$f->id?>/<?=$f->proyecto_id?>','contentModal')" title="Eliminar" >Eliminar</a>
								<?php endif;?>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
			
			<?php if(isset($pagination)):?>
				<div class="pagination pagination-right" id="pag-proyectos_personas">
					<?=$pagination?>
				</div>
			<?php endif; ?>
		<?php else: ?>
			<p>No results!</p>
		<?php endif; ?>

<script>
	$(document).ready(function(){ 
		setPagination('pag-proyectos_personas','result-list'); 
	});
</script>




