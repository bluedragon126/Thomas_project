<?php

/**
 * ArticleHtml form.
 *
 * @package    sisterbt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ArticleHtmlForm extends BaseArticleHtmlForm
{
  public function configure()
  {
      $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'article_id'     => new sfWidgetFormInputText(),
      'html_file_path' => new sfWidgetFormInputText(),
      'created_at'     => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'article_id'     => new sfValidatorInteger(array('required' => false)),
      'html_file_path' => new sfValidatorString(array('max_length' => 200,'required' => false)),
      'created_at'     => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('article_html[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);
  }
}
