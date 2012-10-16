<?php if(isset($alertas) && is_array($alertas) && count($alertas)>0):?>
	
	<div class="span28  result-header" >
		<div class="pull-left"><h4>Resultado</h4></div>
	</div>

	<table class="table table-hover">
		<thead>
			<tr>
				<th>Docente</th>
				<th>D.N.I.</th>
				<th>Cantidad de perfiles asignados</th>
				<th></th>
			</tr>
		</thead>
		<tbodoy>
			<?php foreach($alertas as $f):?>
				<tr class="success">
					<td><strong><?=$f->docente_apellido." ".$f->docente_nombre?></strong></td>
					<td><?=$f->docente_dni?></td>
					<td><?=$f->numero_de_perfiles?></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	
	<?php if(isset($pagination)):?>
		<div class="pagination pagination-right" id="pag-alertas">
			<?=$pagination?>
		</div>
	<?php endif; ?>

	<script>
		$(document).ready(function(){ 
			setPagination('pag-alertas','result-list'); 
			
		});
	</script>

<?php else: ?>
	<p>No results!</p>
<?php endif; ?>