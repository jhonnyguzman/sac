<div class="modal hide fade" id="modalSelectFieldToPrintPDF" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
    	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
   		<h4>PDF - Seleccione campos a mostrar</h4>
  	</div>
  	<div class="modal-body">
    	<form action="<?=base_url()?>consultas_controller/printConsultasPDF_c/" method="post" name="formPrintPDF" id="formPrintPDF">
			<?=$this->load->view("consultas_view/_fieldstoprint_consultas")?>
		</form>
  	</div>
  	<div class="modal-footer">
    	<a href="#" class="btn btn-primary" id="btnDownloadFile">Descargar</a>
  	</div>
</div>
<script>
	$(document).ready(function(){ 

		$("#btnDownloadFile").click(function(){
			window.location = $("#formPrintPDF").attr('action') + "?=" + $("#formSearch").serialize() + "&" + $("#formPrintPDF").serialize();
		});
		
	});
</script>