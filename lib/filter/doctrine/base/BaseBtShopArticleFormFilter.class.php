<?php

/**
 * BtShopArticle filter form base class.
 *
 * @package    sisterbt
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseBtShopArticleFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'btshop_article_author_id'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'btshop_type_id'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('BtShopArticleType'), 'add_empty' => true)),
      'btchart_type_id'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'btshop_article_title'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'btshop_article_subtitle'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'btshop_product_image'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'btshop_product_intro_text'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'btshop_product_description' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'product_weight'             => new sfWidgetFormFilterInput(),
      'published'                  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'is_downloadable'            => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'is_sellable'                => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'download_url'               => new sfWidgetFormFilterInput(),
      'created_at'                 => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'btshop_article_author_id'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'btshop_type_id'             => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('BtShopArticleType'), 'column' => 'id')),
      'btchart_type_id'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'btshop_article_title'       => new sfValidatorPass(array('required' => false)),
      'btshop_article_subtitle'    => new sfValidatorPass(array('required' => false)),
      'btshop_product_image'       => new sfValidatorPass(array('required' => false)),
      'btshop_product_intro_text'  => new sfValidatorPass(array('required' => false)),
      'btshop_product_description' => new sfValidatorPass(array('required' => false)),
      'product_weight'             => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'published'                  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'is_downloadable'            => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'is_sellable'                => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'download_url'               => new sfValidatorPass(array('required' => false)),
      'created_at'                 => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('bt_shop_article_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'BtShopArticle';
  }

  public function getFields()
  {
    return array(
      'id'                         => 'Number',
      'btshop_article_author_id'   => 'Number',
      'btshop_type_id'             => 'ForeignKey',
      'btchart_type_id'            => 'Number',
      'btshop_article_title'       => 'Text',
      'btshop_article_subtitle'    => 'Text',
      'btshop_product_image'       => 'Text',
      'btshop_product_intro_text'  => 'Text',
      'btshop_product_description' => 'Text',
      'product_weight'             => 'Number',
      'published'                  => 'Number',
      'is_downloadable'            => 'Boolean',
      'is_sellable'                => 'Boolean',
      'download_url'               => 'Text',
      'created_at'                 => 'Date',
    );
  }
}
