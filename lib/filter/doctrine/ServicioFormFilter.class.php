<?php

/**
 * Servicio filter form.
 *
 * @package    proximidad
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ServicioFormFilter extends BaseServicioFormFilter
{
	public function configure()
	{
		$user = sfContext::getInstance()->getUser();
		if(!$user->isSuperAdmin())
		{
			$this->widgetSchema['tienda_id'] = new sfWidgetFormDoctrineChoice(array(
				'model' => $this->getRelatedModelName('Tienda'), 
			    'query' => Doctrine_Query::create()->select('t.nombre')->from('Tienda t')->where('t.usuario_id = ?',$user->getGuardUser()->getId()),
				'add_empty' => true
			));
		}
	}
}
