<?php

/**
 * BtShopPriceDetails form base class.
 *
 * @method BtShopPriceDetails getObject() Returns the current form's model object
 *
 * @package    sisterbt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseBtShopPriceDetailsForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                      => new sfWidgetFormInputHidden(),
      'btshop_article_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('BtShopArticle'), 'add_empty' => false)),
      'btshop_product_quantity' => new sfWidgetFormInputText(),
      'btshop_price_unit_id'    => new sfWidgetFormInputText(),
      'btshop_product_price'    => new sfWidgetFormInputText(),
      'btshop_product_text'     => new sfWidgetFormInputText(),
      'created_at'              => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                      => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'btshop_article_id'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('BtShopArticle'))),
      'btshop_product_quantity' => new sfValidatorInteger(),
      'btshop_price_unit_id'    => new sfValidatorInteger(),
      'btshop_product_price'    => new sfValidatorInteger(),
      'btshop_product_text'     => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'created_at'              => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('bt_shop_price_details[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'BtShopPriceDetails';
  }

}
