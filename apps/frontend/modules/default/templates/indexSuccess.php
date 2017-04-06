<?php
    if($sf_user->isAuthenticated())
    {
    	echo $sf_user;
		echo "<a href='".url_for('default/logout')."'>Logout</a>";
	}

?>


	<div id="servicios">
		<?php include_partial('servicios',array('servicios' => $servicios)); ?>
	</div>
