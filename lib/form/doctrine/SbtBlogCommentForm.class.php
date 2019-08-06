<?php

/**
 * SbtBlogComment form.
 *
 * @package    sisterbt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class SbtBlogCommentForm extends BaseSbtBlogCommentForm
{
  public function configure()
  {
    $this->setWidgets(array(
      //'id'           => new sfWidgetFormInputHidden(),
      'blog_id'      => new sfWidgetFormInputHidden(),
      'blog_comment' => new sfWidgetFormTextarea(),
      'comment_by'   => new sfWidgetFormInputHidden(),
      'followup_by_mail' => new sfWidgetFormInputHidden(),
      'created_at'   => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'blog_id'      => new sfValidatorInteger(array('required' => false)),
      'blog_comment' => new sfValidatorString(),
      'comment_by'   => new sfValidatorInteger(array('required' => false)),
      'followup_by_mail' => new sfValidatorInteger(array('required' => false)),
      'created_at'   => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sbt_blog_comment[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);
  }
}
