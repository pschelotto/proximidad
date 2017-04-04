<?php

class defaultActions extends sfActions
{
	public function executeIndex(sfRequest $request)
	{
//		if(!$this->getUser()->hasPermission('Backend'))
//			return $this->redirect('/');
	}
}

