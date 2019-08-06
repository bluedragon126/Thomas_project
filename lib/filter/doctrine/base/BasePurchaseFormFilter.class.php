<?php

/**
 * Purchase filter form base class.
 *
 * @package    sisterbt
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BasePurchaseFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'user_id'         => new sfWidgetFormFilterInput(),
      'email'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'firstname'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'lastname'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'street'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'zipcode'         => new sfWidgetFormFilterInput(),
      'city'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'telephone'       => new sfWidgetFormFilterInput(),
      'country'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'total_price'     => new sfWidgetFormFilterInput(),
      'payment_method'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'transaction_id'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'response_code'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'checkout_status' => new sfWidgetFormFilterInput(),
      'order_processed' => new sfWidgetFormFilterInput(),
      'created_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'payment_date'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'user_id'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'email'           => new sfValidatorPass(array('required' => false)),
      'firstname'       => new sfValidatorPass(array('required' => false)),
      'lastname'        => new sfValidatorPass(array('required' => false)),
      'street'          => new sfValidatorPass(array('required' => false)),
      'zipcode'         => new sfValidatorPass(array('required' => false)),
      'city'            => new sfValidatorPass(array('required' => false)),
      'telephone'       => new sfValidatorPass(array('required' => false)),
      'country'         => new sfValidatorPass(array('required' => false)),
      'total_price'     => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'payment_method'  => new sfValidatorPass(array('required' => false)),
      'transaction_id'  => new sfValidatorPass(array('required' => false)),
      'response_code'   => new sfValidatorPass(array('required' => false)),
      'checkout_status' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'order_processed' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'payment_date'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('purchase_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Purchase';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'user_id'         => 'Number',
      'email'           => 'Text',
      'firstname'       => 'Text',
      'lastname'        => 'Text',
      'street'          => 'Text',
      'zipcode'         => 'Text',
      'city'            => 'Text',
      'telephone'       => 'Text',
      'country'         => 'Text',
      'total_price'     => 'Number',
      'payment_method'  => 'Text',
      'transaction_id'  => 'Text',
      'response_code'   => 'Text',
      'checkout_status' => 'Number',
      'order_processed' => 'Number',
      'created_at'      => 'Date',
      'payment_date'    => 'Date',
    );
  }
}
