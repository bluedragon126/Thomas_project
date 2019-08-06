<?php

/**
 * ArticleCount form base class.
 *
 * @method ArticleCount getObject() Returns the current form's model object
 *
 * @package    sisterbt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseArticleCountForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'        => new sfWidgetFormInputHidden(),
      'art_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Article'), 'add_empty' => false)),
      'click_cnt' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'        => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'art_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Article'))),
      'click_cnt' => new sfValidatorInteger(),
    ));

    $this->widgetSchema->setNameFormat('article_count[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ArticleCount';
  }

}
