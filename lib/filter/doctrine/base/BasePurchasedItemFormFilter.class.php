<?php

/**
 * PurchasedItem filter form base class.
 *
 * @package    sisterbt
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BasePurchasedItemFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'purchase_id'    => new sfWidgetFormFilterInput(),
      'product_id'     => new sfWidgetFormFilterInput(),
      'articleornot'   => new sfWidgetFormFilterInput(),
      'quantity'       => new sfWidgetFormFilterInput(),
      'price_per_unit' => new sfWidgetFormFilterInput(),
      'product_text'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'total_price'    => new sfWidgetFormFilterInput(),
      'shipping'       => new sfWidgetFormFilterInput(),
      'vat'            => new sfWidgetFormFilterInput(),
      'created_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'purchase_id'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'product_id'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'articleornot'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'quantity'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'price_per_unit' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'product_text'   => new sfValidatorPass(array('required' => false)),
      'total_price'    => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'shipping'       => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'vat'            => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'created_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('purchased_item_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'PurchasedItem';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'purchase_id'    => 'Number',
      'product_id'     => 'Number',
      'articleornot'   => 'Number',
      'quantity'       => 'Number',
      'price_per_unit' => 'Number',
      'product_text'   => 'Text',
      'total_price'    => 'Number',
      'shipping'       => 'Number',
      'vat'            => 'Number',
      'created_at'     => 'Date',
    );
  }
}
