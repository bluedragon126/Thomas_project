<?php

/**
 * ReminderSubscription filter form base class.
 *
 * @package    sisterbt
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseReminderSubscriptionFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'subscription_type' => new sfWidgetFormFilterInput(),
      'nof_days'          => new sfWidgetFormFilterInput(),
      'subject'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'email_contain'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'subscription_type' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'nof_days'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'subject'           => new sfValidatorPass(array('required' => false)),
      'email_contain'     => new sfValidatorPass(array('required' => false)),
      'created_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('reminder_subscription_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ReminderSubscription';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'subscription_type' => 'Number',
      'nof_days'          => 'Number',
      'subject'           => 'Text',
      'email_contain'     => 'Text',
      'created_at'        => 'Date',
      'updated_at'        => 'Date',
    );
  }
}
