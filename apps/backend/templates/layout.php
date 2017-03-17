<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  </head>
  <body>
  	<?php
		$menus = array(
			'guard/users' => 'Usuarios',
			'@servicio' => 'Servicios',
			'@tienda' => 'Tiendas',
		);

		echo "<ul>";
		foreach($menus as $url => $menu)
			echo "<a href='".url_for($url)."'><li>$menu</li></a>";
		echo "</ul>";
  	?>
    <?php echo $sf_content ?>
  </body>
</html>
