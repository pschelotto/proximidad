<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<?php include_http_metas() ?>
		<?php include_metas() ?>
		<?php include_title() ?>
		<link rel="shortcut icon" href="/favicon.ico" />
		<?php include_stylesheets() ?>

		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">

		<script src="//code.jquery.com/jquery-2.2.4.min.js"></script>
		<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		<script src="/js/jquery.cookie.js"></script>
		<?php include_javascripts() ?>

	</head>
	<body>
	
		<?php include_partial('main/buscador'); ?>
		<div id='wrapper'>
			<?php echo $sf_content ?>
		</div>

		<div id='dialog'></div>
	</body>
</html>
