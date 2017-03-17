<?php

/**
 * Servicio filter form base class.
 *
 * @package    stetik
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseServicioFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'titulo'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'descripcion' => new sfWidgetFormFilterInput(),
      'tienda_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Tienda'), 'add_empty' => true)),
      'imagen'      => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'titulo'      => new sfValidatorPass(array('required' => false)),
      'descripcion' => new sfValidatorPass(array('required' => false)),
      'tienda_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Tienda'), 'column' => 'id')),
      'imagen'      => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('servicio_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Servicio';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'titulo'      => 'Text',
      'descripcion' => 'Text',
      'tienda_id'   => 'ForeignKey',
      'imagen'      => 'Text',
    );
  }
}
