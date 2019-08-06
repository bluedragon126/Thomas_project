<?php

/**
 * SbtBlogComment filter form base class.
 *
 * @package    sisterbt
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseSbtBlogCommentFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'blog_id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SbtUserBlog'), 'add_empty' => true)),
      'blog_comment'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'comment_by'       => new sfWidgetFormFilterInput(),
      'followup_by_mail' => new sfWidgetFormFilterInput(),
      'created_at'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'blog_id'          => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('SbtUserBlog'), 'column' => 'id')),
      'blog_comment'     => new sfValidatorPass(array('required' => false)),
      'comment_by'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'followup_by_mail' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('sbt_blog_comment_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SbtBlogComment';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'blog_id'          => 'ForeignKey',
      'blog_comment'     => 'Text',
      'comment_by'       => 'Number',
      'followup_by_mail' => 'Number',
      'created_at'       => 'Date',
    );
  }
}
