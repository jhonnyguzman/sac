
		<?php if(isset($proveedores) && is_array($proveedores) && count($proveedores)>0):?>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Id</th>
						<th>C.U.I.T.</th>
						<th>Razon Social</th>
						<th>Domicilio</th>
						<th>Tel&eacute;fono</th>
						<th>Email</th>
						<th>Estado</th>
						<th></th>
					</tr>
				</thead>
				<tbodoy>
					<?php foreach($proveedores as $f):?>
						<tr>
							<td><?=$f->id?></td>
							<td><?=$f->cuit?></td>
							<td><?=$f->razon_social?></td>
							<td><?=$f->domicilio?></td>
							<td><?=$f->telefono?></td>
							<td><?=$f->email?></td>
							<td>
								<?php if($f->habilitado == 1):  ?>
									<span class="label label-success">Habilitado</span>
								<?php elseif($f->habilitado == 0):  ?>
									<span class="label">Desabilitado</span>
								<?php endif;  ?>
							</td>
							<td>
								<?php if($flag['u']):?>
									<a href="<?=base_url()?>proveedores_controller/edit_c/<?=$f->id?>" title="Modificar" >Modificar</a>
								<?php endif;?>
								<?php if($flag['d']):?>
									<a href="#"  onClick="deleteRow('<?=base_url()?>proveedores_controller/delete_c/<?=$f->id?>')" title="Eliminar" >Eliminar</a>
								<?php endif;?>
								<a href="javascript:void(0)" onClick="loadModal('<?=base_url()?>proveedores_rubros_controller/showModal_c/<?=$f->id?>','myModal')">Rubros</a>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
			
			<?php if(isset($pagination)):?>
				<div class="pagination pagination-right" id="pag-proveedores">
					<?=$pagination?>
				</div>
			<?php endif; ?>
		<?php else: ?>
			<p>No results!</p>
		<?php endif; ?>

		<div class="modal hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

<script>
	$(document).ready(function(){ 
		setPagination('pag-proveedores','result-list'); 
	});
</script>


