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
      'dia_semana'   => new sfWidgetFormFilterInput(),
      'franja_desde' => new sfWidgetFormFilterInput(),
      'franja_hasta' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'dia_semana'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'franja_desde' => new sfValidatorPass(array('required' => false)),
      'franja_hasta' => new sfValidatorPass(array('required' => false)),
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
      'id'           => 'Number',
      'dia_semana'   => 'Number',
      'franja_desde' => 'Text',
      'franja_hasta' => 'Text',
    );
  }
}
