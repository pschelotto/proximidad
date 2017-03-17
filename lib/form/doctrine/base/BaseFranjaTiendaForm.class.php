<?php

/**
 * FranjaTienda form base class.
 *
 * @method FranjaTienda getObject() Returns the current form's model object
 *
 * @package    stetik
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseFranjaTiendaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'        => new sfWidgetFormInputHidden(),
      'franja_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Franja'), 'add_empty' => true)),
      'tienda_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Tienda'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'        => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'franja_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Franja'), 'required' => false)),
      'tienda_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Tienda'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('franja_tienda[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'FranjaTienda';
  }

}
