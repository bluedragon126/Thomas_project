<?php

/**
 * ArticleTemplate form base class.
 *
 * @method ArticleTemplate getObject() Returns the current form's model object
 *
 * @package    sisterbt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseArticleTemplateForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'template_id'   => new sfWidgetFormInputHidden(),
      'template_name' => new sfWidgetFormInputText(),
      'author_id'     => new sfWidgetFormInputText(),
      'article_date'  => new sfWidgetFormDateTime(),
      'category_id'   => new sfWidgetFormInputText(),
      'type_id'       => new sfWidgetFormInputText(),
      'object_id'     => new sfWidgetFormInputText(),
      'title'         => new sfWidgetFormInputText(),
      'listheader'    => new sfWidgetFormInputText(),
      'image'         => new sfWidgetFormInputText(),
      'image_text'    => new sfWidgetFormTextarea(),
      'text'          => new sfWidgetFormTextarea(),
      'author'        => new sfWidgetFormInputText(),
      'art_statid'    => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'template_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'template_id', 'required' => false)),
      'template_name' => new sfValidatorString(array('max_length' => 20)),
      'author_id'     => new sfValidatorInteger(),
      'article_date'  => new sfValidatorDateTime(array('required' => false)),
      'category_id'   => new sfValidatorInteger(array('required' => false)),
      'type_id'       => new sfValidatorInteger(array('required' => false)),
      'object_id'     => new sfValidatorInteger(array('required' => false)),
      'title'         => new sfValidatorString(array('max_length' => 100)),
      'listheader'    => new sfValidatorString(array('max_length' => 50)),
      'image'         => new sfValidatorString(array('max_length' => 90)),
      'image_text'    => new sfValidatorString(),
      'text'          => new sfValidatorString(),
      'author'        => new sfValidatorString(array('max_length' => 30)),
      'art_statid'    => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('article_template[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ArticleTemplate';
  }

}
