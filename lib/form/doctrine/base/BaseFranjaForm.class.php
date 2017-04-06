<?php

/**
 * Franja form base class.
 *
 * @method Franja getObject() Returns the current form's model object
 *
 * @package    proximidad
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseFranjaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'        => new sfWidgetFormInputHidden(),
      'tienda_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Tienda'), 'add_empty' => true)),
      'semana'    => new sfWidgetFormInputText(),
      'desde'     => new sfWidgetFormInputText(),
      'hasta'     => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'        => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'tienda_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Tienda'), 'required' => false)),
      'semana'    => new sfValidatorInteger(array('required' => false)),
      'desde'     => new sfValidatorString(array('max_length' => 5, 'required' => false)),
      'hasta'     => new sfValidatorString(array('max_length' => 5, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('franja[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Franja';
  }

}
