<?php

/**
 * BtShopPriceQtyUnit form base class.
 *
 * @method BtShopPriceQtyUnit getObject() Returns the current form's model object
 *
 * @package    sisterbt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseBtShopPriceQtyUnitForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'btshop_price_unit' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'btshop_price_unit' => new sfValidatorString(array('max_length' => 200, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('bt_shop_price_qty_unit[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'BtShopPriceQtyUnit';
  }

}
