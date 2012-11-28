
		<?php if(isset($reintegros) && is_array($reintegros) && count($reintegros)>0):?>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Id</th>
						<th>Tipo</th>
						<th>Monto</th>
						<th>Persona Id</th>
						<th></th>
					</tr>
				</thead>
				<tbodoy>
					<?php foreach($reintegros as $f):?>
						<tr>
							<td><?=$f->id?></td>
							<td><?=$f->tipo?></td>
							<td><?=$f->monto?></td>
							<td><?=$f->persona_id?></td>
							<td>
								<?php if($flag['u']):?>
									<a href="<?=base_url()?>reintegros_controller/edit_c/<?=$f->id?>" title="Modificar" >Modificar</a>
								<?php endif;?>
								<?php if($flag['d']):?>
									<a href="#"  onClick="deleteRow('<?=base_url()?>reintegros_controller/delete_c/<?=$f->id?>')" title="Eliminar" >Eliminar</a>
								<?php endif;?>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
			
			<?php if(isset($pagination)):?>
				<div class="pagination pagination-right" id="pag-reintegros">
					<?=$pagination?>
				</div>
			<?php endif; ?>
		<?php else: ?>
			<p>No results!</p>
		<?php endif; ?>

<script>
	$(document).ready(function(){ 
		setPagination('pag-reintegros','result-list'); 
	});
</script>


