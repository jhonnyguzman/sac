
		<?php if(isset($docentes_titulos) && is_array($docentes_titulos) && count($docentes_titulos)>0):?>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Id</th>
						<th>Docente Id</th>
						<th>Titulo Id</th>
						<th></th>
					</tr>
				</thead>
				<tbodoy>
					<?php foreach($docentes_titulos as $f):?>
						<tr>
							<td><?=$f->id?></td>
							<td><?=$f->docente_id?></td>
							<td><?=$f->titulo_id?></td>
							<td>
								<?php if($flag['u']):?>
									<a href="<?=base_url()?>docentes_titulos_controller/edit_c/<?=$f->id?>" title="Modificar" >Modificar</a>
								<?php endif;?>
								<?php if($flag['d']):?>
									<a href="#"  onClick="deleteRow('<?=base_url()?>docentes_titulos_controller/delete_c/<?=$f->id?>')" title="Eliminar" >Eliminar</a>
								<?php endif;?>
								   
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
			
			<?php if(isset($pagination)):?>
				<div class="pagination pagination-right" id="pag-docentes_titulos">
					<?=$pagination?>
				</div>
			<?php endif; ?>
		<?php else: ?>
			<p>No results!</p>
		<?php endif; ?>

<div class="modal hide fade" id="modaldocentes_titulosPerfiles" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

</div>

<script>
	$(document).ready(function(){ 
		setPagination('pag-docentes_titulos','result-list'); 
	});
</script>
