<?php

require_once dirname(__FILE__).'/../lib/tiendaGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/tiendaGeneratorHelper.class.php';

/**
 * tienda actions.
 *
 * @package    proximidad
 * @subpackage tienda
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class tiendaActions extends autoTiendaActions
{
	protected function buildQuery()
	{
		$query = parent::buildQuery();

		$user = $this->getUser();
		if(!$user->hasPermission('Admin'))
			$query->andWhere('usuario_id = ?', $user->getGuardUser()->getId());

		return $query;
	}
}
