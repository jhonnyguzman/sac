
<?php if(isset($lineas_accion_escuelas) && is_array($lineas_accion_escuelas) && count($lineas_accion_escuelas)>0):?>
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Id</th>
				<th>Linea de Acci&oacute;n</th>
				<th>Ciclo</th>
				<th>Mes</th>
				<th></th>
			</tr>
		</thead>
		<tbodoy>
			<?php foreach($lineas_accion_escuelas as $f):?>
				<tr>
					<td><?=$f->id?></td>
					<td><?=$f->linea_accion_nombre?></td>
					<td><?=$f->ciclo_descripcion?></td>
					<td><?=$f->mes_descripcion?></td>
					<td>
						<?php if($flag['d']):?>
							<a href="#"  onClick="deleteItemModal('<?=base_url()?>lineas_accion_escuelas_controller/delete_c/<?=$f->id?>/<?=$f->linea_periodo_escuela_id?>','contentModal')" title="Eliminar">Eliminar</a>
						<?php endif;?>
						<?php if($flag['u']):?>
							<a href="#" onClick="updateContent('<?=base_url()?>lineas_accion_docentes_controller/show_c/<?=$f->id?>','contentModal')" title="Docentes">Docentes</a>
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
