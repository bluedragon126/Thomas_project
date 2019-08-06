<?php

/**
 * BtNewsletterSubscriber filter form base class.
 *
 * @package    sisterbt
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseBtNewsletterSubscriberFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'user_id'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'email'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'newsletter_type_id' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'is_subscribed'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'sbt_activation_code' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'user_id'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'email'              => new sfValidatorPass(array('required' => false)),
      'newsletter_type_id' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'is_subscribed'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'sbt_activation_code' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('bt_newsletter_subscriber_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'BtNewsletterSubscriber';
  }

  public function getFields()
  {
    return array(
      'id'                 => 'Number',
      'user_id'            => 'Number',
      'email'              => 'Text',
      'newsletter_type_id' => 'Number',
      'is_subscribed'      => 'Number',
      'sbt_activation_code' => 'Number',
    );
  }
}
