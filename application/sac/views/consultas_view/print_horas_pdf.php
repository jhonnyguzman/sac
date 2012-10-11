<?php if(isset($consultas) && is_array($consultas) && count($consultas)>0):?>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

	<div class="header-print">
		<table class="tb-header-print">
			<tr>
				<td><div class="title-print"><?=$title?></div></td>
				<td class="today-date-print">Fecha:&nbsp;<?=$todayDate?></td>
			</tr>
		</table>
	</div>
	<div id="result-list">
	
		<table class="tb-result-set-print">
			<thead>
				<tr>
					<?php foreach($fieldstoprint as $field):?>
					<th><?=$this->config->item($field)?></th>
					<?php endforeach; ?>
				</tr>
			</thead>
			<tbody>
				<?php foreach($consultas as $f):?>
					<tr>
						<?php foreach($fieldstoprint as $field):?>
							<?php if($field == "periodo"): ?>
								<td><?=$f->periodo_fecha_inicio." - ".$f->periodo_fecha_fin?></td>
							<?php elseif($field == "docente"): ?>
								<td><?=$f->docente_apellido." ".$f->docente_nombre?></td>
							<?php else: ?>
								<td><?=$f->$field?></td>
							<?php endif; ?>
						<?php endforeach; ?>
					</tr>
				<?php  endforeach; ?>
			</tbody>
		</table>
	</div>

	<?=$this->load->view("default/_style_to_print")?>

<?php else: ?>
	<p>No results!</p>
<?php endif; ?>
