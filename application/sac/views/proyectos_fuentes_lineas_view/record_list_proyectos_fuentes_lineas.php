
		<?php if(isset($proyectos_fuentes_lineas) && is_array($proyectos_fuentes_lineas) && count($proyectos_fuentes_lineas)>0):?>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Id</th>
						<th>Proyecto Id</th>
						<th>Fuente Linea Id</th>
						<th>Monto Presupuestado</th>
						<th></th>
					</tr>
				</thead>
				<tbodoy>
					<?php foreach($proyectos_fuentes_lineas as $f):?>
						<tr>
							<td><?=$f->id?></td>
							<td><?=$f->proyecto_id?></td>
							<td><?=$f->fuente_linea_id?></td>
							<td><?=$f->monto_presupuestado?></td>
							<td>
								<?php if($flag['u']):?>
									<a href="<?=base_url()?>proyectos_fuentes_lineas_controller/edit_c/<?=$f->id?>" title="Modificar" >Modificar</a>
								<?php endif;?>
								<?php if($flag['d']):?>
									<a href="#"  onClick="deleteRow('<?=base_url()?>proyectos_fuentes_lineas_controller/delete_c/<?=$f->id?>')" title="Eliminar" >Eliminar</a>
								<?php endif;?>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
			
			<?php if(isset($pagination)):?>
				<div class="pagination pagination-right" id="pag-proyectos_fuentes_lineas">
					<?=$pagination?>
				</div>
			<?php endif; ?>
		<?php else: ?>
			<p>No results!</p>
		<?php endif; ?>

<script>
	$(document).ready(function(){ 
		setPagination('pag-proyectos_fuentes_lineas','result-list'); 
	});
</script>



