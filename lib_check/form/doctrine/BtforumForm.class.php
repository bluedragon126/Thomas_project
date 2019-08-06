<?php

/**
 * Btforum form.
 *
 * @package    sisterbt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class BtforumForm extends BaseBtforumForm
{
  public function configure()
  {
  	$this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'author_id'     => new sfWidgetFormInputHidden(),
      'skapare'     => new sfWidgetFormInputHidden(),
      'rubrik'      => new sfWidgetFormInputText(),
      'textarea'    => new sfWidgetFormTextareaTinyMCE(array(
								  'width'  => 500,
								  'height' => 238,
								  'config' => 'theme : "modern",relative_urls : 0,
								   plugins:"emoticons,preview,visualchars,table,image imagetools,code,link",
								   theme_advanced_disable: "anchor,visualaid,image",
								   theme_advanced_buttons1:"bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,fontselect",
								   theme_advanced_buttons2 :"bullist,numlist,|,outdent,indent,|,undo,redo,|,link,unlink,code,|,forecolor",
								   theme_advanced_resizing : false,
								   theme_advanced_buttons3:"emoticons"',
									)),
      'datum'       => new sfWidgetFormInputHidden(),
      'andratdatum' => new sfWidgetFormInputHidden(),
      'visningar'   => new sfWidgetFormInputHidden(),
      'ant_inlagg'  => new sfWidgetFormInputHidden(),
      'amne'        => new sfWidgetFormInputHidden(),
      'koppling'    => new sfWidgetFormInputHidden(),
      'btforum_category_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('BtforumCategory'), 'add_empty' => true)),
      'btforum_subcategory_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('BtforumSubcategory'), 'add_empty' => false)),
    ));
	
    $this->setValidators(array(
      'id'          => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'author_id'     => new sfValidatorString(array('required' => false)),
      'skapare'     => new sfValidatorString(array('required' => false)),
      'rubrik'      => new sfValidatorString(array('max_length' => 50, 'required' => true)),
      'textarea'    => new sfValidatorString(array('required' => true)),
      'datum'       => new sfValidatorDateTime(array('required' => false)),
      'andratdatum' => new sfValidatorDateTime(array('required' => false)),
      'visningar'   => new sfValidatorInteger(array('required' => false)),
      'ant_inlagg'  => new sfValidatorInteger(array('required' => false)),
      'amne'        => new sfValidatorString(array('required' => false)),
      'koppling'    => new sfValidatorString(array('required' => false)),
      'btforum_category_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('BtforumCategory'))),
      'btforum_subcategory_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('BtforumSubcategory'))),
    ));

    $this->widgetSchema->setNameFormat('btforum[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);
  }
}
