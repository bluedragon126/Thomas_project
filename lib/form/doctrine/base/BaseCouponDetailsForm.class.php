<?php

/**
 * CouponDetails form base class.
 *
 * @method CouponDetails getObject() Returns the current form's model object
 *
 * @package    sisterbt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseCouponDetailsForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'user_id'       => new sfWidgetFormInputText(),
      'product_id'    => new sfWidgetFormInputText(),
      'couponcode_id' => new sfWidgetFormInputText(),
      'email'         => new sfWidgetFormInputText(),
      'status'        => new sfWidgetFormInputText(),
      'is_inactive'   => new sfWidgetFormInputText(),
      'created_at'    => new sfWidgetFormDateTime(),
      'updated_at'    => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'user_id'       => new sfValidatorInteger(array('required' => false)),
      'product_id'    => new sfValidatorInteger(array('required' => false)),
      'couponcode_id' => new sfValidatorInteger(array('required' => false)),
      'email'         => new sfValidatorString(array('max_length' => 255)),
      'status'        => new sfValidatorString(array('max_length' => 200)),
      'is_inactive'   => new sfValidatorInteger(),
      'created_at'    => new sfValidatorDateTime(),
      'updated_at'    => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('coupon_details[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CouponDetails';
  }

}
