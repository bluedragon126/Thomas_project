<?php

/**
 * OrderCount filter form base class.
 *
 * @package    sisterbt
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseOrderCountFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'action'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'order_count' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'action'      => new sfValidatorPass(array('required' => false)),
      'order_count' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('order_count_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'OrderCount';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'action'      => 'Text',
      'order_count' => 'Number',
    );
  }
}
