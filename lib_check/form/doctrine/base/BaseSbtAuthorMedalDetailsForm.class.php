<?php

/**
 * SbtAuthorMedalDetails form base class.
 *
 * @method SbtAuthorMedalDetails getObject() Returns the current form's model object
 *
 * @package    sisterbt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseSbtAuthorMedalDetailsForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                   => new sfWidgetFormInputHidden(),
      'author_id'            => new sfWidgetFormInputText(),
      'author_medal_type_id' => new sfWidgetFormInputText(),
      'award_note_by_admin'  => new sfWidgetFormTextarea(),
      'awarded_by'           => new sfWidgetFormInputText(),
      'created_at'           => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                   => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'author_id'            => new sfValidatorInteger(),
      'author_medal_type_id' => new sfValidatorInteger(),
      'award_note_by_admin'  => new sfValidatorString(),
      'awarded_by'           => new sfValidatorInteger(),
      'created_at'           => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sbt_author_medal_details[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SbtAuthorMedalDetails';
  }

}
