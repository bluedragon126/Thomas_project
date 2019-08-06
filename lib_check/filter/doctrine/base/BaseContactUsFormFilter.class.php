<?php

/**
 * ContactUs filter form base class.
 *
 * @package    sisterbt
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseContactUsFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'code'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'subject' => new sfWidgetFormFilterInput(),
      'content' => new sfWidgetFormFilterInput(),
      'type'    => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'code'    => new sfValidatorPass(array('required' => false)),
      'subject' => new sfValidatorPass(array('required' => false)),
      'content' => new sfValidatorPass(array('required' => false)),
      'type'    => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('contact_us_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ContactUs';
  }

  public function getFields()
  {
    return array(
      'id'      => 'Number',
      'code'    => 'Text',
      'subject' => 'Text',
      'content' => 'Text',
      'type'    => 'Text',
    );
  }
}
