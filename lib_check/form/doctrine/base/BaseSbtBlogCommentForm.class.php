<?php

/**
 * SbtBlogComment form base class.
 *
 * @method SbtBlogComment getObject() Returns the current form's model object
 *
 * @package    sisterbt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseSbtBlogCommentForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'blog_id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SbtUserBlog'), 'add_empty' => true)),
      'blog_comment'     => new sfWidgetFormTextarea(),
      'comment_by'       => new sfWidgetFormInputText(),
      'followup_by_mail' => new sfWidgetFormInputText(),
      'created_at'       => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'blog_id'          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('SbtUserBlog'), 'required' => false)),
      'blog_comment'     => new sfValidatorString(),
      'comment_by'       => new sfValidatorInteger(array('required' => false)),
      'followup_by_mail' => new sfValidatorInteger(array('required' => false)),
      'created_at'       => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sbt_blog_comment[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SbtBlogComment';
  }

}
