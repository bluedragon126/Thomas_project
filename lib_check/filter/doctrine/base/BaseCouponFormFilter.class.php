<?php

/**
 * Coupon filter form base class.
 *
 * @package    sisterbt
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseCouponFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'code'        => new sfWidgetFormFilterInput(),
      'code_desc'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'coupon_code' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'status'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'code'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'code_desc'   => new sfValidatorPass(array('required' => false)),
      'coupon_code' => new sfValidatorPass(array('required' => false)),
      'status'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('coupon_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Coupon';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'code'        => 'Number',
      'code_desc'   => 'Text',
      'coupon_code' => 'Text',
      'status'      => 'Number',
      'created_at'  => 'Date',
      'updated_at'  => 'Date',
    );
  }
}
