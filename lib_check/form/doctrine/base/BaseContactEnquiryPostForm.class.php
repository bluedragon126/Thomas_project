<?php

/**
 * ContactEnquiryPost form base class.
 *
 * @method ContactEnquiryPost getObject() Returns the current form's model object
 *
 * @package    sisterbt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseContactEnquiryPostForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'title'         => new sfWidgetFormInputText(),
      'reply_text'    => new sfWidgetFormTextarea(),
      'enq_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ContactEnquiry'), 'add_empty' => false)),
      'author_name'   => new sfWidgetFormInputText(),
      'post_id'       => new sfWidgetFormInputText(),
      'reply_date'    => new sfWidgetFormDateTime(),
      'admin_or_user' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'title'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'reply_text'    => new sfValidatorString(),
      'enq_id'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ContactEnquiry'))),
      'author_name'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'post_id'       => new sfValidatorInteger(array('required' => false)),
      'reply_date'    => new sfValidatorDateTime(),
      'admin_or_user' => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('contact_enquiry_post[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ContactEnquiryPost';
  }

}
