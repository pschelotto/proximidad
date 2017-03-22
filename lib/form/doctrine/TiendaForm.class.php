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
