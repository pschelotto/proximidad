<?php

/**
 * Tienda filter form base class.
 *
 * @package    stetik
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseTiendaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'telefono'  => new sfWidgetFormFilterInput(),
      'direccion' => new sfWidgetFormFilterInput(),
      'codpos'    => new sfWidgetFormFilterInput(),
      'poblacion' => new sfWidgetFormFilterInput(),
      'latitud'   => new sfWidgetFormFilterInput(),
      'longitud'  => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'nombre'    => new sfValidatorPass(array('required' => false)),
      'telefono'  => new sfValidatorPass(array('required' => false)),
      'direccion' => new sfValidatorPass(array('required' => false)),
      'codpos'    => new sfValidatorPass(array('required' => false)),
      'poblacion' => new sfValidatorPass(array('required' => false)),
      'latitud'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'longitud'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('tienda_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tienda';
  }

  public function getFields()
  {
    return array(
      'id'        => 'Number',
      'nombre'    => 'Text',
      'telefono'  => 'Text',
      'direccion' => 'Text',
      'codpos'    => 'Text',
      'poblacion' => 'Text',
      'latitud'   => 'Number',
      'longitud'  => 'Number',
    );
  }
}
