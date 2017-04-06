<?php

/**
 * Franja filter form base class.
 *
 * @package    proximidad
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseFranjaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'tienda_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Tienda'), 'add_empty' => true)),
      'semana'    => new sfWidgetFormFilterInput(),
      'desde'     => new sfWidgetFormFilterInput(),
      'hasta'     => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'tienda_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Tienda'), 'column' => 'id')),
      'semana'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'desde'     => new sfValidatorPass(array('required' => false)),
      'hasta'     => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('franja_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Franja';
  }

  public function getFields()
  {
    return array(
      'id'        => 'Number',
      'tienda_id' => 'ForeignKey',
      'semana'    => 'Number',
      'desde'     => 'Text',
      'hasta'     => 'Text',
    );
  }
}
