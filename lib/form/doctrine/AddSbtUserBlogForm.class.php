<?php

/**
 * SbtUserBlog form.
 *
 * @package    sisterbt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AddSbtUserBlogForm extends BaseSbtUserBlogForm
{
  public function configure()
  {
  	   $this->setWidgets(array(
      'id'                 => new sfWidgetFormInputHidden(),
      'author_id'          => new sfWidgetFormInputHidden(),
      'ublog_category_id'  => new sfWidgetFormSelect(array('choices' => array())),
      'ublog_type_id'      => new sfWidgetFormSelect(array('choices' => array())),
      'ublog_object_id'    => new sfWidgetFormSelect(array('choices' => array())),
      'ublog_market_id'    => new sfWidgetFormSelect(array('choices' => array())),
      'ublog_stocklist_id' => new sfWidgetFormSelect(array('choices' => array())),
      'ublog_sector_id'    => new sfWidgetFormSelect(array('choices' => array())),
      'ublog_title'        => new sfWidgetFormInputText(),
      'ublog_description'  => new sfWidgetFormTextareaTinyMCE(array(
								  'width'  => 499,
								  'height' => 108,
								  'config' => 'theme : "modern",relative_urls : 0,
								   plugins:"emoticons,preview,visualchars,table,image imagetools,code,link",
								   theme_advanced_disable: "anchor,visualaid,image",
								   theme_advanced_buttons1:"bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,fontselect,fontsizeselect",
								   theme_advanced_buttons2 :"bullist,numlist,|,outdent,indent,|,undo,redo,|,link,unlink,code,|,preview,forecolor",
								   theme_advanced_resizing : false,
								   theme_advanced_buttons3:"emoticons"',
									)),

      'ublog_views'        => new sfWidgetFormInputHidden(),
      'ublog_votes'        => new sfWidgetFormInputHidden(),
      'created_at'         => new sfWidgetFormInputHidden(),
      'updated_at'         => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'id'                 => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'author_id'          => new sfValidatorInteger(array('required' => false)),
      'ublog_category_id'  => new sfValidatorInteger(array('required' => false)),
      'ublog_type_id'      => new sfValidatorInteger(array('required' => false)),
      'ublog_object_id'    => new sfValidatorInteger(array('required' => false)),
      'ublog_market_id'    => new sfValidatorInteger(array('required' => false)),
      'ublog_stocklist_id' => new sfValidatorInteger(array('required' => false)),
      'ublog_sector_id'    => new sfValidatorInteger(array('required' => false)),
      'ublog_title'        => new sfValidatorString(array('max_length' => 200, 'required' => true)),
      'ublog_description'  => new sfValidatorString(array('required' => false)),
      'ublog_views'        => new sfValidatorInteger(array('required' => false)),
      'ublog_votes'        => new sfValidatorInteger(array('required' => false)),
      'created_at'         => new sfValidatorDateTime(array('required' => false)),
      'updated_at'         => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sbt_user_blog[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();
  }
}
