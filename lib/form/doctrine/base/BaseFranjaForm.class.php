<?php

/**
 * Franja form base class.
 *
 * @method Franja getObject() Returns the current form's model object
 *
 * @package    stetik
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseFranjaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'dia_semana'   => new sfWidgetFormInputText(),
      'franja_desde' => new sfWidgetFormInputText(),
      'franja_hasta' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'dia_semana'   => new sfValidatorInteger(array('required' => false)),
      'franja_desde' => new sfValidatorString(array('max_length' => 5, 'required' => false)),
      'franja_hasta' => new sfValidatorString(array('max_length' => 5, 'required' => false)),
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
