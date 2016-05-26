<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>jQuery UI Dialog - Basic modal</title>
	<link rel="stylesheet" href="<?php echo base_url('css'); ?>/themes/base/jquery.ui.all.css">
	<script src="<?php echo base_url('js'); ?>/jquery-1.10.2.js"></script>
	<script src="<?php echo base_url('js/ui'); ?>/jquery.ui.core.js"></script>
	<script src="<?php echo base_url('js/ui'); ?>/jquery.ui.widget.js"></script>
	<script src="<?php echo base_url('js/ui'); ?>/jquery.ui.mouse.js"></script>
	<script src="<?php echo base_url('js/ui'); ?>/jquery.ui.draggable.js"></script>
	<script src="<?php echo base_url('js/ui'); ?>/jquery.ui.position.js"></script>
	<script src="<?php echo base_url('js/ui'); ?>/jquery.ui.resizable.js"></script>
	<script src="<?php echo base_url('js/ui'); ?>/jquery.ui.button.js"></script>
	<script src="<?php echo base_url('js/ui'); ?>/jquery.ui.dialog.js"></script>
	<link rel="stylesheet" href="<?php echo base_url('css'); ?>/demos.css">
	<script>
	$(function() {
		$( "#dialog-modal" ).dialog(
		{
			height: 140,
			modal: true
		});
	});
	</script>
</head>
<body>

<div id="dialog-modal" title="Congratulations">
	<p>CI Working with jQuery for Bitdepartment Development Division</p>
</div>

<h3>Initial development backbone</h3>

</body>
</html>