<?php

/**
 * FranjaTienda filter form base class.
 *
 * @package    stetik
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseFranjaTiendaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'franja_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Franja'), 'add_empty' => true)),
      'tienda_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Tienda'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'franja_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Franja'), 'column' => 'id')),
      'tienda_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Tienda'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('franja_tienda_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'FranjaTienda';
  }

  public function getFields()
  {
    return array(
      'id'        => 'Number',
      'franja_id' => 'ForeignKey',
      'tienda_id' => 'ForeignKey',
    );
  }
}
