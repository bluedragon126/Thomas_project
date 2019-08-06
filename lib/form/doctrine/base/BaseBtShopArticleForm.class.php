<?php

/**
 * BtShopArticle form base class.
 *
 * @method BtShopArticle getObject() Returns the current form's model object
 *
 * @package    sisterbt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseBtShopArticleForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                         => new sfWidgetFormInputHidden(),
      'btshop_article_author_id'   => new sfWidgetFormInputText(),
      'btshop_type_id'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('BtShopArticleType'), 'add_empty' => false)),
      'btchart_type_id'            => new sfWidgetFormInputText(),
      'btshop_article_title'       => new sfWidgetFormInputText(),
      'btshop_article_subtitle'    => new sfWidgetFormInputText(),
      'btshop_product_image'       => new sfWidgetFormInputText(),
      'btshop_product_intro_text'  => new sfWidgetFormTextarea(),
      'btshop_product_description' => new sfWidgetFormTextarea(),
      'product_weight'             => new sfWidgetFormInputText(),
      'published'                  => new sfWidgetFormInputText(),
      'is_downloadable'            => new sfWidgetFormInputCheckbox(),
      'is_sellable'                => new sfWidgetFormInputCheckbox(),
      'download_url'               => new sfWidgetFormInputText(),
      'created_at'                 => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                         => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'btshop_article_author_id'   => new sfValidatorInteger(),
      'btshop_type_id'             => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('BtShopArticleType'))),
      'btchart_type_id'            => new sfValidatorInteger(),
      'btshop_article_title'       => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'btshop_article_subtitle'    => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'btshop_product_image'       => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'btshop_product_intro_text'  => new sfValidatorString(),
      'btshop_product_description' => new sfValidatorString(),
      'product_weight'             => new sfValidatorNumber(array('required' => false)),
      'published'                  => new sfValidatorInteger(array('required' => false)),
      'is_downloadable'            => new sfValidatorBoolean(array('required' => false)),
      'is_sellable'                => new sfValidatorBoolean(array('required' => false)),
      'download_url'               => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'created_at'                 => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('bt_shop_article[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'BtShopArticle';
  }

}
