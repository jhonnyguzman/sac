
<?php if(isset($horas_institucionales) && is_array($horas_institucionales) && count($horas_institucionales)>0):?>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Id</th>
				<th>Cantidad Horas</th>
				<th>Linea periodo escuela id</th>
				<th></th>
			</tr>
		</thead>
		<tbodoy>
			<?php foreach($horas_institucionales as $f):?>
				<tr>
					<td><?=$f->id?></td>
					<td><?=$f->cantidad_horas?></td>
					<td><?=$f->linea_periodo_escuela_id?></td>
					<td>
						<?php if($flag['u']):?>
							<a href="<?=base_url()?>horas_institucionales_controller/edit_c/<?=$f->id?>" title="Modificar" class="btn boton_rojo">Modificar</a>
						<?php endif;?>
						<?php if($flag['d']):?>
							<a href="#"  onClick="deleteRow('<?=base_url()?>horas_institucionales_controller/delete_c/<?=$f->id?>')" title="Eliminar" class="btn boton_rojo">Eliminar</a>
						<?php endif;?>
						   
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	
	<?php if(isset($pagination)):?>
		<div class="pagination pagination-right" id="pag-horas_institucionales">
			<?=$pagination?>
		</div>
	<?php endif; ?>
<?php else: ?>
	<p>No results!</p>
<?php endif; ?>

<script>
	$(document).ready(function(){ 
		setPagination('pag-horas_institucionales','result-list'); 
	});
</script>
