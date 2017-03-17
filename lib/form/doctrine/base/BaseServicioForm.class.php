<?php

/**
 * Servicio form base class.
 *
 * @method Servicio getObject() Returns the current form's model object
 *
 * @package    stetik
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseServicioForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'titulo'      => new sfWidgetFormInputText(),
      'descripcion' => new sfWidgetFormInputText(),
      'tienda_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Tienda'), 'add_empty' => true)),
      'imagen'      => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'titulo'      => new sfValidatorString(array('max_length' => 50)),
      'descripcion' => new sfValidatorPass(array('required' => false)),
      'tienda_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Tienda'), 'required' => false)),
      'imagen'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('servicio[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Servicio';
  }

}
