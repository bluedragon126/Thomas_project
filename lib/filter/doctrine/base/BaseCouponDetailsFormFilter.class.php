<?php

/**
 * CouponDetails filter form base class.
 *
 * @package    sisterbt
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseCouponDetailsFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'user_id'       => new sfWidgetFormFilterInput(),
      'product_id'    => new sfWidgetFormFilterInput(),
      'couponcode_id' => new sfWidgetFormFilterInput(),
      'email'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'status'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'is_inactive'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'user_id'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'product_id'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'couponcode_id' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'email'         => new sfValidatorPass(array('required' => false)),
      'status'        => new sfValidatorPass(array('required' => false)),
      'is_inactive'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('coupon_details_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CouponDetails';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'user_id'       => 'Number',
      'product_id'    => 'Number',
      'couponcode_id' => 'Number',
      'email'         => 'Text',
      'status'        => 'Text',
      'is_inactive'   => 'Number',
      'created_at'    => 'Date',
      'updated_at'    => 'Date',
    );
  }
}
