<?php

/**
 * NewsLetter form base class.
 *
 * @method NewsLetter getObject() Returns the current form's model object
 *
 * @package    sisterbt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseNewsLetterForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'name'        => new sfWidgetFormInputText(),
      'ads'         => new sfWidgetFormInputText(),
      'article'     => new sfWidgetFormTextarea(),
      'sbt_article' => new sfWidgetFormInputText(),
      'blog'        => new sfWidgetFormInputText(),
      'publish'     => new sfWidgetFormInputCheckbox(),
      'sent'        => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'name'        => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'ads'         => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'article'     => new sfValidatorString(array('max_length' => 500, 'required' => false)),
      'sbt_article' => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'blog'        => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'publish'     => new sfValidatorBoolean(array('required' => false)),
      'sent'        => new sfValidatorBoolean(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('news_letter[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'NewsLetter';
  }

}
