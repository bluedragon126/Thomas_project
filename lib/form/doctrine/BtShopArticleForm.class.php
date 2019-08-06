<?php

/**
 * BtShopArticle form.
 *
 * @package    sisterbt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class BtShopArticleForm extends BaseBtShopArticleForm
{
  public function configure()
  {
  	$this->widgetSchema['btshop_article_author_id'] = new sfWidgetFormInputHidden();
	$this->widgetSchema['btshop_product_intro_text'] = new sfWidgetFormTextarea();
	$this->widgetSchema['btshop_type_id'] = new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('BtShopArticleType'), 'add_empty' => false));
	$this->widgetSchema['btshop_product_description'] = new sfWidgetFormTextareaTinyMCE(array(
									  'width'  => 545,
									  'height' => 350,
									  'config' => 'theme : "modern",relative_urls : 0,
									   plugins:"emoticons,preview,visualchars,table,image imagetools,code,link",
									   theme_advanced_disable: "anchor,visualaid,image",
									   theme_advanced_buttons1:"bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,fontselect",
									   theme_advanced_buttons2 :"bullist,numlist,|,outdent,indent,|,undo,redo,|,link,unlink,code,|,preview,forecolor",
									   theme_advanced_buttons3:"emoticons"',
									   ));
	

    $this->validatorSchema['btshop_article_author_id'] = new sfValidatorInteger();
    $this->validatorSchema['btshop_product_intro_text'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['btshop_type_id'] = new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('BtShopArticleType')));
    $this->validatorSchema['btshop_product_description'] = new sfValidatorString();
		
    $this->widgetSchema->setNameFormat('bt_shop_article[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);
  }
}
