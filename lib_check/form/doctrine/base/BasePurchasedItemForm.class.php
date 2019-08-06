<?php

/**
 * PurchasedItem form base class.
 *
 * @method PurchasedItem getObject() Returns the current form's model object
 *
 * @package    sisterbt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BasePurchasedItemForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'purchase_id'    => new sfWidgetFormInputText(),
      'product_id'     => new sfWidgetFormInputText(),
      'articleornot'   => new sfWidgetFormInputText(),
      'quantity'       => new sfWidgetFormInputText(),
      'price_per_unit' => new sfWidgetFormInputText(),
      'product_text'   => new sfWidgetFormInputText(),
      'total_price'    => new sfWidgetFormInputText(),
      'shipping'       => new sfWidgetFormInputText(),
      'vat'            => new sfWidgetFormInputText(),
      'created_at'     => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'purchase_id'    => new sfValidatorInteger(array('required' => false)),
      'product_id'     => new sfValidatorInteger(array('required' => false)),
      'articleornot'   => new sfValidatorInteger(array('required' => false)),
      'quantity'       => new sfValidatorInteger(array('required' => false)),
      'price_per_unit' => new sfValidatorInteger(array('required' => false)),
      'product_text'   => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'total_price'    => new sfValidatorNumber(array('required' => false)),
      'shipping'       => new sfValidatorNumber(array('required' => false)),
      'vat'            => new sfValidatorNumber(array('required' => false)),
      'created_at'     => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('purchased_item[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'PurchasedItem';
  }

}
