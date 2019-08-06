<?php

/**
 * BtShopPriceDetails filter form base class.
 *
 * @package    sisterbt
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseBtShopPriceDetailsFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'btshop_article_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('BtShopArticle'), 'add_empty' => true)),
      'btshop_product_quantity' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'btshop_price_unit_id'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'btshop_product_price'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'btshop_product_text'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'              => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'btshop_article_id'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('BtShopArticle'), 'column' => 'id')),
      'btshop_product_quantity' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'btshop_price_unit_id'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'btshop_product_price'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'btshop_product_text'     => new sfValidatorPass(array('required' => false)),
      'created_at'              => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('bt_shop_price_details_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'BtShopPriceDetails';
  }

  public function getFields()
  {
    return array(
      'id'                      => 'Number',
      'btshop_article_id'       => 'ForeignKey',
      'btshop_product_quantity' => 'Number',
      'btshop_price_unit_id'    => 'Number',
      'btshop_product_price'    => 'Number',
      'btshop_product_text'     => 'Text',
      'created_at'              => 'Date',
    );
  }
}
