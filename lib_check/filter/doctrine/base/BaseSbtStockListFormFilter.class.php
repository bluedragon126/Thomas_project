<?php

/**
 * SbtStockList filter form base class.
 *
 * @package    sisterbt
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseSbtStockListFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'stock_name'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'display_order' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'stock_name'    => new sfValidatorPass(array('required' => false)),
      'display_order' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('sbt_stock_list_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SbtStockList';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'stock_name'    => 'Text',
      'display_order' => 'Number',
    );
  }
}
