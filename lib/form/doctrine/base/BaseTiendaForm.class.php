<?php

/**
 * Tienda form base class.
 *
 * @method Tienda getObject() Returns the current form's model object
 *
 * @package    stetik
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseTiendaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'        => new sfWidgetFormInputHidden(),
      'nombre'    => new sfWidgetFormInputText(),
      'telefono'  => new sfWidgetFormInputText(),
      'direccion' => new sfWidgetFormInputText(),
      'codpos'    => new sfWidgetFormInputText(),
      'poblacion' => new sfWidgetFormInputText(),
      'latitud'   => new sfWidgetFormInputText(),
      'longitud'  => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'        => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'nombre'    => new sfValidatorString(array('max_length' => 50)),
      'telefono'  => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'direccion' => new sfValidatorString(array('max_length' => 80, 'required' => false)),
      'codpos'    => new sfValidatorString(array('max_length' => 5, 'required' => false)),
      'poblacion' => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'latitud'   => new sfValidatorPass(array('required' => false)),
      'longitud'  => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tienda[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tienda';
  }

}
