<?=$this->load->view('default/_header_admin')?>

<div class="span28">
	<div class="page-header">
	  <h3><?=$title_header?></h3>
	</div>
	<?php if(validation_errors() || isset($error)): ?>
		<div class="alert alert-error">
			<a class="close" data-dismiss="alert" href="#">×</a>
			<?=validation_errors()?>
			
		</div>		
	<?php endif; ?>
	<form action="<?=base_url()?>facturas_controller/add_c" method="post" name="formAddfacturas" id="formAddfacturas" 
		class="form-horizontal form-aling-left">  
		
		<div class="control-group">
			<label class="control-label" for="proveedor_id"><?=$this->config->item('proveedor_id')?>:</label>
			<div class="controls">
				<select name="proveedor_id" id="proveedor_id">
					<?php foreach($proveedores as $f): ?>
						<option value="<?=$f->id?>"><?=$f->razon_social?></option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="nro_factura"><?=$this->config->item('nro_factura')?>:</label>
			<div class="controls">
				<input type="text" name="nro_factura" id="nro_factura"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="fecha"><?=$this->config->item('fecha')?>:</label>
			<div class="controls">
				<input type="text" name="fecha" id="fecha"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="monto"><?=$this->config->item('monto')?>:</label>
			<div class="controls">
				<input type="text" name="monto" id="monto"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="estado"><?=$this->config->item('estado')?>:</label>
			<div class="controls">
				<select name="estado" id="estado">
					<?php foreach($estados as $f): ?>
						<option value="<?=$f->id?>"><?=$f->descripcion?></option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="observacion"><?=$this->config->item('observacion')?>:</label>
			<div class="controls">
				<textarea name="observacion" id="observacion"></textarea>
			</div>
		</div>

		<h4>Detalle</h4>
		<hr>

		<div>
			Concepto: <input type="text" name="concepto" id="concepto"></input>	
			Costo: <input type="text" name="costo" id="costo" class="input-mini"></input>	
			Cantidad: <input type="text" name="cantidad" id="cantidad" class="input-mini"></input>	
			Subtotal: <input type="text" name="subtotal" id="subtotal" class="input-mini" readonly></input>	
			<a class="btn btn-success" id="btnAgregarLinea" href="#" ><i class="icon-plus-sign icon-white"></i></a>
		</div>
		<hr>
		<div>
			<table class="table" id="tbLineasFacturas">
				<thead>
					<tr>
						<th>#</th>
						<th>Concepto</th>
						<th>Costo</th>
						<th>Cantidad</th>
						<th>Subtotal</th>
						<th></th>
					</tr>	
				</thead>	
				<tbody>
				</tbody>
			</table>
		</div>
		<div class="form-actions">
	    	<a href="<?=base_url()?>facturas_controller/index" class="btn" >Cancelar</a>
	    	<button type="submit" class="btn btn-primary" >Guardar</button>
	    </div>
	</form>

</div><!--/span10-->

<script type="text/javascript">
	var cantFilas = 1;
	
	$(document).ready(function(){
		$("#btnAgregarLinea").click(function(){
			runLinea();
			calcTotal();
		});

		$('#costo').keyup(function () {
  			this.value = this.value.replace(/[^0-9.]/g,'');
		});
		$('#cantidad').keyup(function () {
  			this.value = this.value.replace(/[^0-9]/g,'');
		});
		$('#cantidad,#costo').change(function () {
  			$("#subtotal").val(calcSubtotal());
		});
	});	
	
	function runLinea(){
		var n = $("tr th",$("#tbLineasFacturas")).length;
		var concepto = $("#concepto").val();
		var costo = $("#costo").val();
		var cantidad = $("#cantidad").val();
		var subtotal = $("#subtotal").val();
		if(concepto != '' &&  costo != '' && cantidad != '' && subtotal != '')
		{
			var tds = "<tr>";
			for(var i=0; i < n; i++){
				 if(i == 0)
				 	tds += "<td><span class='cantFilas'>"+cantFilas+"</span></td>";
				 if(i == 1)
				 	tds += "<td>"+concepto+"<input type='hidden' name='concepto[]' id='concepto-"+cantFilas+"' value='"+concepto+"'/></td>";
				 if(i == 2)
				 	tds += "<td>$ "+costo+"<input type='hidden' name='costo[]' id='costo-"+cantFilas+"' value='"+costo+"' class='input-mini'/></td>";
				 if(i == 3)
				 	tds += "<td>"+cantidad+"<input type='hidden' name='cantidad[]' id='cantidad-"+cantFilas+"' value='"+cantidad+"' class='input-mini'/></td>";
				 if(i == 4)
				 	tds += "<td>$ "+subtotal+"<input type='hidden' name='subtotal[]' id='subtotal-"+cantFilas+"' value='"+subtotal+"' class='input-mini subtotal'/></td>";
				 if(i == 5)
				  	tds += "<td><a href='#' onClick=\"removeLinea(this,"+cantFilas+")\">Eliminar</a></td>";
			}
			tds += "</tr>";
			$("#tbLineasFacturas").append(tds);
			cantFilas++;
			$("#concepto").val('').focus();
			$("#costo").val('');
			$("#cantidad").val('');
			$("#subtotal").val('');
		}else{
			alert("No ingreso datos!");
		}
	}
	
</script>

<?=$this->load->view('default/_footer_admin')?>