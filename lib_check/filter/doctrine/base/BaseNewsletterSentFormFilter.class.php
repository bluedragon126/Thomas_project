<?php

/**
 * NewsletterSent filter form base class.
 *
 * @package    sisterbt
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseNewsletterSentFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'date'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'recipiants' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'kundgrupp'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'subject'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'body'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'date'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'recipiants' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'kundgrupp'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'subject'    => new sfValidatorPass(array('required' => false)),
      'body'       => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('newsletter_sent_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'NewsletterSent';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'date'       => 'Date',
      'recipiants' => 'Number',
      'kundgrupp'  => 'Number',
      'subject'    => 'Text',
      'body'       => 'Text',
    );
  }
}
