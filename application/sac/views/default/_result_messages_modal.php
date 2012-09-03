<?php if($this->session->flashdata('flashConfirmModal')): ?>
	<div class="alert alert-success">
		<a class="close" data-dismiss="alert" href="#">×</a>
		<?=$this->session->flashdata('flashConfirmModal')?>
	</div>
<?php endif; ?>

<?php if($this->session->flashdata('flashErrorModal')): ?> 
	<div class="alert alert-error">
		<a class="close" data-dismiss="alert" href="#">×</a>
		<?=$this->session->flashdata('flashErrorModal')?>
	</div>
<?php endif; ?>