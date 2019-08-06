<?php

/**
 * BorstArticleComment form base class.
 *
 * @method BorstArticleComment getObject() Returns the current form's model object
 *
 * @package    sisterbt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseBorstArticleCommentForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'article_comment' => new sfWidgetFormTextarea(),
      'subject'         => new sfWidgetFormTextarea(),
      'article_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Article'), 'add_empty' => false)),
      'comment_by'      => new sfWidgetFormInputText(),
      'created_at'      => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'article_comment' => new sfValidatorString(),
      'subject'         => new sfValidatorString(),
      'article_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Article'), 'required' => false)),
      'comment_by'      => new sfValidatorInteger(array('required' => false)),
      'created_at'      => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('borst_article_comment[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'BorstArticleComment';
  }

}
