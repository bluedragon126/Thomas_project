<?php

/**
 * ContactEnquiry form.
 *
 * @package    sisterbt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ContactEnquiryForm extends BaseContactEnquiryForm
{
  public function configure()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'enq_type'      => new sfWidgetFormSelect(array('choices' => array())),
      'enq_subject'   => new sfWidgetFormInputText(),
      'firstname'     => new sfWidgetFormInputText(),
      'lastname'      => new sfWidgetFormInputText(),
      'email'         => new sfWidgetFormInputText(),
      'user_question' => new sfWidgetFormTextareaTinyMCE(array(
                'width'  => 499,
                'height' => 108,
                'config' => 'theme : "modern",relative_urls:0,document_base_url:"https://www.borstjanaren.se/"
                ,plugins:"emoticons,preview,visualchars,table,image imagetools,code,link",
                theme_advanced_buttons1:"undo,redo,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,formatselect,fontselect",
                theme_advanced_buttons2 : "bullist,numlist,|,outdent,indent,|,link,unlink,image,code,|,preview,|,forecolor",
                theme_advanced_resizing : false,
                theme_advanced_buttons3 : "emoticons"',	
		  
						)),
      'mobile'        => new sfWidgetFormInputText(),
      'comm_id'       => new sfWidgetFormInputText(),
      'is_answered'   => new sfWidgetFormInputText(),
      'enq_date'      => new sfWidgetFormInputHidden(),
      'faster_ans_flag'   => new sfWidgetFormInputHidden(),
      'user_signature'      => new sfWidgetFormInputText(),
      'visningar'   => new sfWidgetFormInputHidden(),
      'replycount'   => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'enq_type'      => new sfValidatorString(array(),array('required' => 'OBS! Välj typ av förfrågan')),
      'enq_subject'   => new sfValidatorString(array('max_length' => 200),array('required' => 'OBS! Du har inte fyllt i någon rubrik')),
      'firstname'     => new sfValidatorString(array('max_length' => 100),array('required' => 'OBS! Förnamnsfältet är tomt')),
      'lastname'      => new sfValidatorString(array('max_length' => 100),array('required' => 'OBS! Efternamnsfältet är tomt')),
      'email'         => new sfValidatorEmail(array('max_length' => 128),array('required' => 'OBS! Du har inte fyllt i någon e-postadress','invalid' => 'OBS! Inmatad e-post har inte rätt syntax!')),
      'user_question' => new sfValidatorString(array(),array('required' => 'OBS! Frågan är tom')),
      'comm_id'       => new sfValidatorInteger(array('required' => false)),
      'mobile'        => new sfValidatorString(array('max_length' => 100,'required' => false)),
      'is_answered'   => new sfValidatorInteger(array('required' => false)),
      'enq_date'      => new sfValidatorDateTime(array('required' => false)),
      'faster_ans_flag'   => new sfValidatorInteger(array('required' => false)),
      'user_signature'    => new sfValidatorString(array('max_length' => 100),array('required' => false)),
      'visningar'   => new sfValidatorInteger(array('required' => false)),
      'replycount'    => new sfValidatorString(array('max_length' => 100),array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('contact_enquiry[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);    
  }
}
