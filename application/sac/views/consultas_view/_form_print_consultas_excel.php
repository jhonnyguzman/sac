<div class="modal hide fade" id="modalSelectFieldToPrintExcel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
    	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
   		<h4>EXCEL- Seleccione campos a mostrar</h4>
  	</div>
  	<div class="modal-body">
    	<form action="<?=base_url()?>consultas_controller/printConsultasExcel_c/" method="post" name="formPrintExcel" id="formPrintExcel">
			<?=$this->load->view("consultas_view/_fieldstoprint_consultas")?>
		</form>
  	</div>
  	<div class="modal-footer">
    	<a href="#" class="btn btn-primary" id="btnDownloadFileExcel">Descargar</a>
  	</div>
</div>
<script>
	$(document).ready(function(){ 

		$("#btnDownloadFileExcel").click(function(){
			window.location = $("#formPrintExcel").attr('action') + "?=" + $("#formSearch").serialize() + "&" + $("#formPrintExcel").serialize();
		});
		
		
	});
</script>

