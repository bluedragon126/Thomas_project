<?php

/**
 * ContactEnquiryPost form.
 *
 * @package    sisterbt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ContactEnquiryPostForm extends BaseContactEnquiryPostForm
{
  public function configure()
  {
  $this->setWidgets(array(
      'reply_text'  => new sfWidgetFormTextareaTinyMCE(array(
								  'width'  => 545,
								  'height' => 350,
								  'config' => 'theme : "modern",relative_urls : 0,
								   plugins:"emoticons,preview,visualchars,table,image imagetools,code,link",
								   theme_advanced_disable: "anchor,visualaid",
								   theme_advanced_buttons1:"spellchecker,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,fontselect",
								   theme_advanced_buttons2 :"image,bullist,numlist,|,outdent,indent,|,undo,redo,|,link,unlink,code,|,preview,forecolor",
								   theme_advanced_buttons3:"emoticons",
                                                                   spellchecker_language: "English=en,Danish=da,Dutch=nl,Finnish=fi,French=fr_FR,German=de,Italian=it,Polish=pl,Portuguese=pt_BR,Spanish=es,Swedish=sv",',
									)),
      'enq_id'      => new sfWidgetFormInputText(),
      'reply_date'  => new sfWidgetFormDateTime(),
      'admin_or_user'   => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'reply_text'  => new sfValidatorString(array('required' => false)),
      'enq_id'      => new sfValidatorInteger(array('required' => false)),
      'reply_date'  => new sfValidatorDateTime(array('required' => false)),
      'admin_or_user'    => new sfValidatorString(array('max_length' => 100),array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('contact_enquiry_post[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);
  }
}
