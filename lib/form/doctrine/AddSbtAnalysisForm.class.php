<?php

/**
 * SbtAnalysis form.
 *
 * @package    sisterbt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AddSbtAnalysisForm extends BaseSbtAnalysisForm
{
  public function configure()
  {
  	  $this->setWidgets(array(
      'id'                     => new sfWidgetFormInputHidden(),
      'author_id'              => new sfWidgetFormInputHidden(),
      'analysis_category_id'   => new sfWidgetFormSelect(array('choices' => array())),
      'analysis_type_id'       => new sfWidgetFormSelect(array('choices' => array())),
      'analysis_object_id'     => new sfWidgetFormSelect(array('choices' => array())),
      'analysis_market_id'     => new sfWidgetFormSelect(array('choices' => array())),
      'analysis_stocklist_id'  => new sfWidgetFormSelect(array('choices' => array())),
      'analysis_sector_id'     => new sfWidgetFormSelect(array('choices' => array())),
      'analysis_title'         => new sfWidgetFormInputText(),
      'image'                  => new sfWidgetFormInputHidden(),
      'image_text'             => new sfWidgetFormTextarea(),
      'analysis_description'   => new sfWidgetFormTextareaTinyMCE(array(
								  'width'  => 499,
								  'height' => 108,								  								  
								  'config' => 'theme : "modern",relative_urls : 0,
								   plugins:"emoticons,preview,visualchars,table,image imagetools,code,link",
								   theme_advanced_disable: "anchor,visualaid,image",
								   theme_advanced_buttons1:"bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,fontselect,fontsizeselect",
								   theme_advanced_buttons2 :"bullist,numlist,|,outdent,indent,|,undo,redo,|,link,unlink,code,|,preview,forecolor",
								   theme_advanced_resizing : true,
								   theme_advanced_buttons3:"emoticons"',
									)),
      'analysis_votes'         => new sfWidgetFormInputText(),
      'analysis_views'         => new sfWidgetFormInputText(),
      'analysis_medal_achived' => new sfWidgetFormInputText(),
      'published'              => new sfWidgetFormInputHidden(),
      'created_at'             => new sfWidgetFormInputHidden(),
      'updated_at'             => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'id'                     => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'author_id'              => new sfValidatorInteger(array('required' => false)),
      'analysis_category_id'   => new sfValidatorInteger(array('required' => false)),
      'analysis_type_id'       => new sfValidatorInteger(array('required' => false)),
      'analysis_object_id'     => new sfValidatorInteger(array('required' => false)),
      'analysis_market_id'     => new sfValidatorInteger(array('required' => false)),
      'analysis_stocklist_id'  => new sfValidatorInteger(array('required' => false)),
      'analysis_sector_id'     => new sfValidatorInteger(array('required' => false)),
      'author_id'              => new sfValidatorInteger(),
      'analysis_title'         => new sfValidatorString(array('max_length' => 200, 'required' => true)),
      'image'                  => new sfValidatorString(array('required' => false)),
      'image_text'             => new sfValidatorString(array('required' => false)),
      'analysis_description'   => new sfValidatorString(array('required' => false)),
      'analysis_votes'         => new sfValidatorInteger(array('required' => false)),
      'analysis_views'         => new sfValidatorInteger(array('required' => false)),
      'analysis_medal_achived' => new sfValidatorInteger(array('required' => false)),
      'published'              => new sfValidatorInteger(array('required' => false)),
      'created_at'             => new sfValidatorDateTime(array('required' => false)),
      'updated_at'             => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sbt[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();
  }
}
