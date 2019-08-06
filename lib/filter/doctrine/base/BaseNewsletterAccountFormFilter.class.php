<?php

/**
 * NewsletterAccount filter form base class.
 *
 * @package    sisterbt
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseNewsletterAccountFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'email' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'email' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('newsletter_account_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'NewsletterAccount';
  }

  public function getFields()
  {
    return array(
      'id'    => 'Number',
      'email' => 'Text',
    );
  }
}
