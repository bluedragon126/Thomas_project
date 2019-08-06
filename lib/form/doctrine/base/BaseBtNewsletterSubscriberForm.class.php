<?php

/**
 * BtNewsletterSubscriber form base class.
 *
 * @method BtNewsletterSubscriber getObject() Returns the current form's model object
 *
 * @package    sisterbt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseBtNewsletterSubscriberForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                 => new sfWidgetFormInputHidden(),
      'user_id'            => new sfWidgetFormInputText(),
      'email'              => new sfWidgetFormInputText(),
      'newsletter_type_id' => new sfWidgetFormInputText(),
      'is_subscribed'      => new sfWidgetFormInputText(),
      'sbt_activation_code' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                 => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'user_id'            => new sfValidatorInteger(),
      'email'              => new sfValidatorString(array('max_length' => 128)),
      'newsletter_type_id' => new sfValidatorInteger(),
      'is_subscribed'      => new sfValidatorInteger(array('required' => false)),
      'sbt_activation_code' => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('bt_newsletter_subscriber[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'BtNewsletterSubscriber';
  }

}
