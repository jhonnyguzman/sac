<?php 
  $mitad = round(count($fieldShow)/2);
?>
<div class="pull-left">
	<?php for($i=0; $i < $mitad; $i++): ?>
		<label class="checkbox">
			<input type="checkbox" name="toprint[]" value="<?=$fieldShow[$i]?>" checked><?=$this->config->item($fieldShow[$i])?>
		</label>
	<?php endfor; ?>
</div>
<div class="pull-right">
	<?php for($i=$mitad; $i < count($fieldShow); $i++): ?>
		<?php if($fieldShow[$i] != "horas_gastadas" && $fieldShow[$i] != "horas_restantes"): ?>
			<label class="checkbox">
				<input type="checkbox" name="toprint[]" value="<?=$fieldShow[$i]?>" checked><?=$this->config->item($fieldShow[$i])?>
			</label>
		<?php endif; ?>
	<?php endfor; ?>
</div>


<div class="span28" id="modalOrientacion">
	<hr>
	<strong>Orientaci&oacute;n:</strong><br>
	<input type="radio" name="orientacion" value="portrait" checked /> Vertical<br>
	<input type="radio" name="orientacion" value="landscape" /> Horizontal
</div>

