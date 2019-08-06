<?php

/**
 * BorstArticleComment filter form base class.
 *
 * @package    sisterbt
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseBorstArticleCommentFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'article_comment' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'subject'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'article_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Article'), 'add_empty' => true)),
      'comment_by'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'article_comment' => new sfValidatorPass(array('required' => false)),
      'subject'         => new sfValidatorPass(array('required' => false)),
      'article_id'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Article'), 'column' => 'article_id')),
      'comment_by'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('borst_article_comment_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'BorstArticleComment';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'article_comment' => 'Text',
      'subject'         => 'Text',
      'article_id'      => 'ForeignKey',
      'comment_by'      => 'Number',
      'created_at'      => 'Date',
    );
  }
}
