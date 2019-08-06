<?php

/**
 * BtShopPriceQtyUnit filter form base class.
 *
 * @package    sisterbt
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseBtShopPriceQtyUnitFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'btshop_price_unit' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'btshop_price_unit' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('bt_shop_price_qty_unit_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'BtShopPriceQtyUnit';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'btshop_price_unit' => 'Text',
    );
  }
}
