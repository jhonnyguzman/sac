
		<?php if(isset($rubros) && is_array($rubros) && count($rubros)>0):?>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Id</th>
						<th>Nombre</th>
						<th>¿Es Monto transferible?</th>
						<th></th>
					</tr>
				</thead>
				<tbodoy>
					<?php foreach($rubros as $f):?>
						<tr>
							<td><?=$f->id?></td>
							<td><?=$f->nombre?></td>
							<td><?php if ($f->es_monto_transferible=="1") echo "Si"; else echo "No";  ?></td>
							<td>
								<?php if($flag['u']):?>
									<a href="<?=base_url()?>rubros_controller/edit_c/<?=$f->id?>" title="Modificar" >Modificar</a>
								<?php endif;?>
								<?php if($flag['d']):?>
									<a href="#"  onClick="deleteRow('<?=base_url()?>rubros_controller/delete_c/<?=$f->id?>')" title="Eliminar" >Eliminar</a>
								<?php endif;?>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
			
			<?php if(isset($pagination)):?>
				<div class="pagination pagination-right" id="pag-rubros">
					<?=$pagination?>
				</div>
			<?php endif; ?>
		<?php else: ?>
			<p>No results!</p>
		<?php endif; ?>

<script>
	$(document).ready(function(){ 
		setPagination('pag-rubros','result-list'); 
	});
</script>



