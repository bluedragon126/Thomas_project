<?php

/**
 * BorstArticleComment form.
 *
 * @package    sisterbt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class BorstArticleCommentForm extends BaseBorstArticleCommentForm
{
  public function configure()
  {
   $this->setWidgets(array(
      'subject'  => new sfWidgetFormInput(),
      'article_comment' => new sfWidgetFormTextarea(array(),array('rows' => '10', 'cols' => '59')),                              
      'article_id'      => new sfWidgetFormInputHidden(),
      'comment_by'      => new sfWidgetFormInputHidden(),
      'created_at'      => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'subject'  => new sfValidatorString(array('required' => true)),
      'article_comment' => new sfValidatorString(array('required' => 'Required') ),
      'article_id'      => new sfValidatorInteger(array('required' => false)),
      'comment_by'      => new sfValidatorInteger(array('required' => false)),
      'created_at'      => new sfValidatorDateTime(array('required' => false)),
    ));
    
   $this->widgetSchema->setLabels(array(
   'subject'      => "Subject",
   'article_comment'      => "Comment",
  ));

    $this->widgetSchema->setNameFormat('borst_article_comment[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

  }
}
