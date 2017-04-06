<?php

/**
 * Tienda filter form.
 *
 * @package    proximidad
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TiendaFormFilter extends BaseTiendaFormFilter
{
	public function configure()
	{
		$user = sfContext::getInstance()->getUser();

		if(!$user->isSuperAdmin())
			$this->widgetSchema['usuario_id'] = new sfWidgetFormInputHidden();
	}
}
