<?php

/**
 * Article filter form base class.
 *
 * @package    sisterbt
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseArticleFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'author_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => true)),
      'article_date' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'category_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ArticleCategory'), 'add_empty' => true)),
      'type_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ArticleType'), 'add_empty' => true)),
      'object_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Objekt'), 'add_empty' => true)),
      'btshop_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('BtShopArticle'), 'add_empty' => true)),
      'price'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'title'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'listheader'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'image'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'image_text'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'text'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'author'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'art_statid'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ArticleStatus'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'author_id'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('sfGuardUser'), 'column' => 'id')),
      'article_date' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'category_id'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('ArticleCategory'), 'column' => 'category_id')),
      'type_id'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('ArticleType'), 'column' => 'type_id')),
      'object_id'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Objekt'), 'column' => 'object_id')),
      'btshop_id'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('BtShopArticle'), 'column' => 'id')),
      'price'        => new sfValidatorPass(array('required' => false)),
      'title'        => new sfValidatorPass(array('required' => false)),
      'listheader'   => new sfValidatorPass(array('required' => false)),
      'image'        => new sfValidatorPass(array('required' => false)),
      'image_text'   => new sfValidatorPass(array('required' => false)),
      'text'         => new sfValidatorPass(array('required' => false)),
      'author'       => new sfValidatorPass(array('required' => false)),
      'art_statid'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('ArticleStatus'), 'column' => 'art_statid')),
    ));

    $this->widgetSchema->setNameFormat('article_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Article';
  }

  public function getFields()
  {
    return array(
      'article_id'   => 'Number',
      'author_id'    => 'ForeignKey',
      'article_date' => 'Date',
      'category_id'  => 'ForeignKey',
      'type_id'      => 'ForeignKey',
      'object_id'    => 'ForeignKey',
      'btshop_id'    => 'ForeignKey',
      'price'        => 'Text',
      'title'        => 'Text',
      'listheader'   => 'Text',
      'image'        => 'Text',
      'image_text'   => 'Text',
      'text'         => 'Text',
      'author'       => 'Text',
      'art_statid'   => 'ForeignKey',
    );
  }
}
