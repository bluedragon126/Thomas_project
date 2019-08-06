<?php

/**
 * Article form base class.
 *
 * @method Article getObject() Returns the current form's model object
 *
 * @package    sisterbt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseArticleForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'article_id'   => new sfWidgetFormInputHidden(),
      'author_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => false)),
      'article_date' => new sfWidgetFormDateTime(),
      'category_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ArticleCategory'), 'add_empty' => false)),
      'type_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ArticleType'), 'add_empty' => false)),
      'object_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Objekt'), 'add_empty' => false)),
      'btshop_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('BtShopArticle'), 'add_empty' => false)),
      'price'        => new sfWidgetFormInputText(),
      'title'        => new sfWidgetFormInputText(),
      'listheader'   => new sfWidgetFormInputText(),
      'image'        => new sfWidgetFormInputText(),
      'image_text'   => new sfWidgetFormTextarea(),
      'text'         => new sfWidgetFormTextarea(),
      'author'       => new sfWidgetFormInputText(),
      'art_statid'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ArticleStatus'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'article_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'article_id', 'required' => false)),
      'author_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'))),
      'article_date' => new sfValidatorDateTime(array('required' => false)),
      'category_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ArticleCategory'), 'required' => false)),
      'type_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ArticleType'), 'required' => false)),
      'object_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Objekt'), 'required' => false)),
      'btshop_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('BtShopArticle'), 'required' => false)),
      'price'        => new sfValidatorString(array('max_length' => 50)),
      'title'        => new sfValidatorString(array('max_length' => 100)),
      'listheader'   => new sfValidatorString(array('max_length' => 50)),
      'image'        => new sfValidatorString(array('max_length' => 90)),
      'image_text'   => new sfValidatorString(),
      'text'         => new sfValidatorString(),
      'author'       => new sfValidatorString(array('max_length' => 30)),
      'art_statid'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ArticleStatus'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('article[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Article';
  }

}
