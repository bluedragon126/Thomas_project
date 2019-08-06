<?php

/**
 * ArticleStatus form base class.
 *
 * @method ArticleStatus getObject() Returns the current form's model object
 *
 * @package    sisterbt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseArticleStatusForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'art_statid' => new sfWidgetFormInputHidden(),
      'art_status' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'art_statid' => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'art_statid', 'required' => false)),
      'art_status' => new sfValidatorString(array('max_length' => 15)),
    ));

    $this->widgetSchema->setNameFormat('article_status[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ArticleStatus';
  }

}
