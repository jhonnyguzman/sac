<?php if(isset($consultas) && is_array($consultas) && count($consultas)>0):?>
	
	<div class="span28  result-header" >
			<div class="pull-left"><h4>Resultado</h4></div>
			<div class="pull-right" >
				<div class="btn-toolbar">
					<div class="btn-group">
						<a class="btn" href="#modalSelectFieldToPrintExcel" id="btnDownloadExcel" data-toggle="modal">Excel</i></a>
						<a class="btn" href="#modalSelectFieldToPrintPDF" id="btnDownloadPDF"  data-toggle="modal">PDF</i></a>
					</div>
				</div>
			</div>
	</div>

	<table class="table table-hover">
		<thead>
			<tr>
				<th>Circuito</th>
				<th>Dpto.</th>
				<th>Localidad</th>
				<th>Escuela</th>
				<th>Periodo</th>
				<th>Mes</th>
				<th>Resolución</th>
				<th>Costo/Hora</th>
				<th>Docente</th>
				<th>DNI</th>
				<th>Perfil</th>
				<th>Linea de acción</th>
				<th>Horas Asignadas</th>
				<th></th>
			</tr>
		</thead>
		<tbodoy>
			<?php foreach($consultas as $f):?>
				<tr>
					<td><?=$f->circuito_nombre?></td>
					<td><?=$f->departamento_nombre?></td>
					<td><?=$f->localidad_nombre?></td>
					<td><a hreef="#" onClick="loadModal('<?=base_url()?>escuelas_controller/showModal_c/<?=$f->escuelas_id?>','myModal')"><?=$f->escuela_nombre?></a></td>
					<td><?=$f->periodo_fecha_inicio." - ".$f->periodo_fecha_fin?></td>
					<td><?=$f->mes_descripcion?></td>
					<td><?=$f->resolucion?></td>
					<td>$&nbsp;<?=$f->periodo_costo_hora?></td>
					<td><strong><?=$f->docente_apellido." ".$f->docente_nombre?></strong></td>
					<td><?=$f->docente_dni?></td>
					<td><?=$f->perfil_nombre?></td>
					<td><?=$f->linea_accion_nombre?></td>
					<td><?=$f->linea_accion_docente_cantidad_horas?></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	
	<?php if(isset($pagination)):?>
		<div class="pagination pagination-right" id="pag-consultas">
			<?=$pagination?>
		</div>
	<?php endif; ?>

	<?=$this->load->view("consultas_view/_form_print_consultas_excel")?>
	<?=$this->load->view("consultas_view/_form_print_consultas_pdf")?>
	<div class="modal hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	</div>

	<script>
		$(document).ready(function(){ 
			setPagination('pag-consultas','result-list'); 
			
			$('#modalSelectFieldToPrintExcel').on('show', function () {
				 $("#modalOrientacion").css("display","none");
			})
			$('#modalSelectFieldToPrintPDF').on('show', function () {
				 $("#modalOrientacion").css("display","block");
			})
		});
	</script>

<?php else: ?>
	<p>No results!</p>
<?php endif; ?>