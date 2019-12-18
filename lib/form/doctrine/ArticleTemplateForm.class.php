<?php

/**
 * ArticleTemplate form.
 *
 * @package    sisterbt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ArticleTemplateForm extends BaseArticleTemplateForm
{
  public function configure()
  {
    $this->setWidgets(array(
      'template_id'   => new sfWidgetFormInputHidden(),
      'template_name' => new sfWidgetFormInputHidden(),
      'article_date'  => new sfWidgetFormDateTime(),
      'category_id'   => new sfWidgetFormSelect(array('choices' => array())),
      'type_id'       => new sfWidgetFormSelect(array('choices' => array())),
      'object_id'     => new sfWidgetFormSelect(array('choices' => array())),
      'btshop_id'     => new sfWidgetFormSelect(array('choices' => array())),
      'price'         => new sfWidgetFormInputText(),
      'title'         => new sfWidgetFormInputText(),
      'image'         => new sfWidgetFormInputText(),
      'image_text'    => new sfWidgetFormTextarea(),
	  'text'          => new sfWidgetFormTextareaTinyMCE(array(
                'width'  => 622,
                'height' => 550,
                'config' => 'theme : "modern",relative_urls:0,document_base_url:"https://www.borstjanaren.se/"
                ,plugins:"emoticons,preview,visualchars,table,image imagetools,code,link",
                theme_advanced_buttons1:"undo,redo,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,formatselect,fontselect",
                theme_advanced_buttons2 : "bullist,numlist,|,outdent,indent,|,link,unlink,image,code,|,preview,|,forecolor",
                theme_advanced_resizing : false,
                theme_advanced_buttons3 : "emoticons"',	
		  
						)),
      'author_id'       => new sfWidgetFormSelect(array('choices' =>Doctrine::getTable('Authors')->getAuthorArray())),
      'author'    => new sfWidgetFormInputHidden(),
      'art_statid'   => new sfWidgetFormSelect(array('choices' => array())),
    ));

    $this->setValidators(array(
      'template_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'template_id', 'required' => false)),
      'template_name' => new sfValidatorString(array('max_length' => 20,'required' => false)),
      'author_id'    => new sfValidatorInteger(array('required' => false)),
      'article_date'  => new sfValidatorDateTime(array('required' => false)),
      'category_id'   => new sfValidatorInteger(array('required' => false)),
      'type_id'       => new sfValidatorInteger(array('required' => false)),
      'object_id'     => new sfValidatorInteger(array('required' => false)),
      'btshop_id'     => new sfValidatorInteger(array('required' => false)),
      'title'         => new sfValidatorString(array('max_length' => 100,'required' => false)),
      'price'         => new sfValidatorString(array('required' => false)),
      'image'         => new sfValidatorString(array('max_length' => 90,'required' => false)),
      'image_text'    => new sfValidatorString(array('required' => false)),      
      'text'          => new sfValidatorString(array('required' => false)),
      'author'        => new sfValidatorString(array('max_length' => 30,'required' => false)),
      'art_statid'    => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('article_template[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);
  }
}
