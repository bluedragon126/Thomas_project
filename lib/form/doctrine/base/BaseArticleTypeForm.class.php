<?php

/**
 * ArticleType form base class.
 *
 * @method ArticleType getObject() Returns the current form's model object
 *
 * @package    sisterbt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseArticleTypeForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'type_id'   => new sfWidgetFormInputHidden(),
      'type_name' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'type_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'type_id', 'required' => false)),
      'type_name' => new sfValidatorString(array('max_length' => 15)),
    ));

    $this->widgetSchema->setNameFormat('article_type[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ArticleType';
  }

}
