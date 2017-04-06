<?php

require_once dirname(__FILE__).'/../lib/servicioGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/servicioGeneratorHelper.class.php';

/**
 * servicio actions.
 *
 * @package    proximidad
 * @subpackage servicio
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class servicioActions extends autoServicioActions
{
	protected function buildQuery()
	{
		$query = parent::buildQuery();

		$user = $this->getUser();
		if(!$user->hasPermission('Admin'))
		{
			$query
				->leftJoin('r.Tienda t')
				->andWhere('t.usuario_id = ?', $user->getGuardUser()->getId());
		}

		return $query;
	}
}
