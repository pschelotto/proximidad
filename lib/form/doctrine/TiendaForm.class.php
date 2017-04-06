<?php

/**
 * Tienda form.
 *
 * @package    proximidad
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TiendaForm extends BaseTiendaForm
{
	public function configure()
	{
		$this->widgetSchema['latitud'] = new sfWidgetFormInputHidden();
		$this->widgetSchema['longitud'] = new sfWidgetFormInputHidden();

		$user = sfContext::getInstance()->getUser();

		if($this->getObject()->isNew())
			$this->getObject()->setUsuario($user->getGuardUser());

		if(!$user->isSuperAdmin())
			$this->widgetSchema['usuario_id'] = new sfWidgetFormInputHidden();


		//Documentos anexos
		$form = new FranjaCollectionForm(null, array(
			'registro' => $this->getObject(),
			'cantidad' => 7,
		));
		$this->embedForm('franjas', $form);
		$this->widgetSchema['franjas']->setLabel('Franjas');

		$this->widgetSchema['lista_franjas'] = new sfWidgetListaFranjas(array(
			'registro' => $this->getObject()
		));
		$this->widgetSchema['lista_franjas']->setLabel('Franjas');
		$this->validatorSchema['lista_franjas'] = new sfValidatorPass();
	}

	protected function doUpdateObject($values)
	{
		$api_key = sfConfig::get('app_apikey');
		$addr = urlencode($values['direccion'].','.$values['codpos'].','.$values['poblacion']);

		$url = "https://maps.googleapis.com/maps/api/geocode/json?address={$addr}&key={$api_key}";
		$json = json_decode(file_get_contents("https://maps.googleapis.com/maps/api/geocode/json?address={$addr}&key={$api_key}"));

		$values['longitud'] = $json->results[0]->geometry->location->lng;
		$values['latitud'] = $json->results[0]->geometry->location->lat;

		return parent::doUpdateObject($values);
	}
}
