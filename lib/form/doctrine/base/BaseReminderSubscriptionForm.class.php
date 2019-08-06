<?php

/**
 * ReminderSubscription form base class.
 *
 * @method ReminderSubscription getObject() Returns the current form's model object
 *
 * @package    sisterbt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseReminderSubscriptionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'subscription_type' => new sfWidgetFormInputText(),
      'nof_days'          => new sfWidgetFormInputText(),
      'subject'           => new sfWidgetFormInputText(),
      'email_contain'     => new sfWidgetFormTextarea(),
      'created_at'        => new sfWidgetFormDateTime(),
      'updated_at'        => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'subscription_type' => new sfValidatorInteger(array('required' => false)),
      'nof_days'          => new sfValidatorInteger(array('required' => false)),
      'subject'           => new sfValidatorString(array('max_length' => 200)),
      'email_contain'     => new sfValidatorString(array('max_length' => 500)),
      'created_at'        => new sfValidatorDateTime(),
      'updated_at'        => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('reminder_subscription[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ReminderSubscription';
  }

}
