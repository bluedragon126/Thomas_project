<?php

/**
 * ContactEnquiry form base class.
 *
 * @method ContactEnquiry getObject() Returns the current form's model object
 *
 * @package    sisterbt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseContactEnquiryForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'enq_type'        => new sfWidgetFormInputText(),
      'enq_subject'     => new sfWidgetFormInputText(),
      'firstname'       => new sfWidgetFormInputText(),
      'lastname'        => new sfWidgetFormInputText(),
      'email'           => new sfWidgetFormInputText(),
      'user_question'   => new sfWidgetFormTextarea(),
      'comm_id'         => new sfWidgetFormInputText(),
      'is_answered'     => new sfWidgetFormInputText(),
      'enq_date'        => new sfWidgetFormDateTime(),
      'faster_ans_flag' => new sfWidgetFormInputText(),
      'user_signature'  => new sfWidgetFormInputText(),
      'visningar'       => new sfWidgetFormInputText(),
      'replycount'      => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'enq_type'        => new sfValidatorString(array('max_length' => 20)),
      'enq_subject'     => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'firstname'       => new sfValidatorString(array('max_length' => 100)),
      'lastname'        => new sfValidatorString(array('max_length' => 100)),
      'email'           => new sfValidatorString(array('max_length' => 128)),
      'user_question'   => new sfValidatorString(),
      'comm_id'         => new sfValidatorString(array('max_length' => 255)),
      'is_answered'     => new sfValidatorInteger(array('required' => false)),
      'enq_date'        => new sfValidatorDateTime(),
      'faster_ans_flag' => new sfValidatorInteger(array('required' => false)),
      'user_signature'  => new sfValidatorString(array('max_length' => 100)),
      'visningar'       => new sfValidatorInteger(),
      'replycount'      => new sfValidatorString(array('max_length' => 100)),
    ));

    $this->widgetSchema->setNameFormat('contact_enquiry[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ContactEnquiry';
  }

}
