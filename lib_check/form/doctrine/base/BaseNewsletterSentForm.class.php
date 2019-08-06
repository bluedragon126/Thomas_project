<?php

/**
 * NewsletterSent form base class.
 *
 * @method NewsletterSent getObject() Returns the current form's model object
 *
 * @package    sisterbt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseNewsletterSentForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'date'       => new sfWidgetFormDate(),
      'recipiants' => new sfWidgetFormInputText(),
      'kundgrupp'  => new sfWidgetFormInputText(),
      'subject'    => new sfWidgetFormInputText(),
      'body'       => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'date'       => new sfValidatorDate(array('required' => false)),
      'recipiants' => new sfValidatorInteger(array('required' => false)),
      'kundgrupp'  => new sfValidatorInteger(array('required' => false)),
      'subject'    => new sfValidatorString(array('max_length' => 50)),
      'body'       => new sfValidatorString(array('max_length' => 60)),
    ));

    $this->widgetSchema->setNameFormat('newsletter_sent[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'NewsletterSent';
  }

}
