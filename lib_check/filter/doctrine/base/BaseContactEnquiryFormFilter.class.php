<?php

/**
 * ContactEnquiry filter form base class.
 *
 * @package    sisterbt
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseContactEnquiryFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'enq_type'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'enq_subject'     => new sfWidgetFormFilterInput(),
      'firstname'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'lastname'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'email'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'user_question'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'comm_id'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'is_answered'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'enq_date'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'faster_ans_flag' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'user_signature'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'visningar'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'replycount'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'enq_type'        => new sfValidatorPass(array('required' => false)),
      'enq_subject'     => new sfValidatorPass(array('required' => false)),
      'firstname'       => new sfValidatorPass(array('required' => false)),
      'lastname'        => new sfValidatorPass(array('required' => false)),
      'email'           => new sfValidatorPass(array('required' => false)),
      'user_question'   => new sfValidatorPass(array('required' => false)),
      'comm_id'         => new sfValidatorPass(array('required' => false)),
      'is_answered'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'enq_date'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'faster_ans_flag' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'user_signature'  => new sfValidatorPass(array('required' => false)),
      'visningar'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'replycount'      => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('contact_enquiry_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ContactEnquiry';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'enq_type'        => 'Text',
      'enq_subject'     => 'Text',
      'firstname'       => 'Text',
      'lastname'        => 'Text',
      'email'           => 'Text',
      'user_question'   => 'Text',
      'comm_id'         => 'Text',
      'is_answered'     => 'Number',
      'enq_date'        => 'Date',
      'faster_ans_flag' => 'Number',
      'user_signature'  => 'Text',
      'visningar'       => 'Number',
      'replycount'      => 'Text',
    );
  }
}
