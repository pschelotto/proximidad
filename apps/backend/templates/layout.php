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
			'Control de Acceso' => array(
				'guard/users' => 'Usuarios',
				'guard/groups' => 'Grupos',
				'guard/permissions' => 'Permisos',
			),
			'@servicio' => 'Servicios',
			'@tienda' => 'Tiendas',
			'sf_guard_signout' => 'Logout',
		);

		if(!$sf_user->isSuperAdmin())
			unset($menus['Control de Acceso']);

		echo "<div id='sf_admin_menu'>";
		echo "<ul>";
		foreach($menus as $url => $menu)
		{
			if(is_array($menu))
			{
				echo "<li class='node'>$url";
				echo "<ul class='desplegable'>";
				foreach($menu as $url => $submenu)
				{
					$selected = strstr($_SERVER['REQUEST_URI'],$url)!==false ? 'selected':'';
					echo "<a href='".url_for($url)."'><li class='$selected'>$submenu</li></a>";
				}

				echo "</ul></li>";
			}
			else
			{
				$selected = '@'.sfContext::getInstance()->getModuleName()==$url ? 'selected':'';
				echo "<a href='".url_for($url)."'><li class='node $selected'>$menu</li></a>";
			}
		}
		echo "</ul>";
		echo "<div style='clear:both'></div>";
		echo "</div>";
  	?>
    <?php echo $sf_content ?>
  </body>
</html>
