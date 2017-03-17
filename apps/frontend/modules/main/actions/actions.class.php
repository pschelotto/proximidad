<?php

class mainActions extends sfActions
{
	public function executeIndex(sfRequest $request)
	{
		$this->servicios = Doctrine::getTable('Servicio')->findAll();
	}
}

