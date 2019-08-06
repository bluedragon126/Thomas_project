<?php

/**
 * ArticleCategory form base class.
 *
 * @method ArticleCategory getObject() Returns the current form's model object
 *
 * @package    sisterbt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseArticleCategoryForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'category_id'   => new sfWidgetFormInputHidden(),
      'category_name' => new sfWidgetFormInputText(),
      'category_icon' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'category_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'category_id', 'required' => false)),
      'category_name' => new sfValidatorString(array('max_length' => 20)),
      'category_icon' => new sfValidatorString(array('max_length' => 15)),
    ));

    $this->widgetSchema->setNameFormat('article_category[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ArticleCategory';
  }

}
