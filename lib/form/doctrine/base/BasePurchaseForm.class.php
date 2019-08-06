<?php

/**
 * Purchase form base class.
 *
 * @method Purchase getObject() Returns the current form's model object
 *
 * @package    sisterbt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BasePurchaseForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'user_id'         => new sfWidgetFormInputText(),
      'email'           => new sfWidgetFormInputText(),
      'firstname'       => new sfWidgetFormInputText(),
      'lastname'        => new sfWidgetFormInputText(),
      'street'          => new sfWidgetFormInputText(),
      'zipcode'         => new sfWidgetFormInputText(),
      'city'            => new sfWidgetFormInputText(),
      'telephone'       => new sfWidgetFormInputText(),
      'country'         => new sfWidgetFormInputText(),
      'total_price'     => new sfWidgetFormInputText(),
      'payment_method'  => new sfWidgetFormInputText(),
      'transaction_id'  => new sfWidgetFormInputText(),
      'response_code'   => new sfWidgetFormInputText(),
      'checkout_status' => new sfWidgetFormInputText(),
      'order_processed' => new sfWidgetFormInputText(),
      'created_at'      => new sfWidgetFormDateTime(),
      'payment_date'    => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'user_id'         => new sfValidatorInteger(array('required' => false)),
      'email'           => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'firstname'       => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'lastname'        => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'street'          => new sfValidatorString(array('max_length' => 200)),
      'zipcode'         => new sfValidatorString(array('max_length' => 15, 'required' => false)),
      'city'            => new sfValidatorString(array('max_length' => 200)),
      'telephone'       => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'country'         => new sfValidatorString(array('max_length' => 4)),
      'total_price'     => new sfValidatorNumber(array('required' => false)),
      'payment_method'  => new sfValidatorString(array('max_length' => 200)),
      'transaction_id'  => new sfValidatorString(array('max_length' => 200)),
      'response_code'   => new sfValidatorString(array('max_length' => 20)),
      'checkout_status' => new sfValidatorInteger(array('required' => false)),
      'order_processed' => new sfValidatorInteger(array('required' => false)),
      'created_at'      => new sfValidatorDateTime(array('required' => false)),
      'payment_date'    => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('purchase[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Purchase';
  }

}
