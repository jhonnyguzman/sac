
<?php if(isset($lineas_accion_escuelas) && is_array($lineas_accion_escuelas) && count($lineas_accion_escuelas)>0):?>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Id</th>
				<th>Periodo escuela id</th>
				<th>Linea accion id</th>
				<th></th>
			</tr>
		</thead>
		<tbodoy>
			<?php foreach($lineas_accion_escuelas as $f):?>
				<tr>
					<td><?=$f->id?></td>
					<td><?=$f->periodo_escuela_id?></td>
					<td><?=$f->linea_accion_id?></td>
					<td>
						<?php if($flag['u']):?>
							<a href="<?=base_url()?>lineas_accion_escuelas_controller/edit_c/<?=$f->id?>" title="Modificar" class="btn boton_rojo">Modificar</a>
						<?php endif;?>
						<?php if($flag['d']):?>
							<a href="#"  onClick="deleteRow('<?=base_url()?>lineas_accion_escuelas_controller/delete_c/<?=$f->id?>')" title="Eliminar" class="btn boton_rojo">Eliminar</a>
						<?php endif;?>
						   
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	
	<?php if(isset($pagination)):?>
		<div class="pagination pagination-right" id="pag-lineas_accion_escuelas">
			<?=$pagination?>
		</div>
	<?php endif; ?>
<?php else: ?>
	<p>No results!</p>
<?php endif; ?>

<script>
	$(document).ready(function(){ 
		setPagination('pag-lineas_accion_escuelas','result-list'); 
	});
</script>
