<?php

/**
 * SbtAnalysisMedalDetails form base class.
 *
 * @method SbtAnalysisMedalDetails getObject() Returns the current form's model object
 *
 * @package    sisterbt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseSbtAnalysisMedalDetailsForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                     => new sfWidgetFormInputHidden(),
      'analysis_id'            => new sfWidgetFormInputText(),
      'analysis_medal_type_id' => new sfWidgetFormInputText(),
      'award_note_by_admin'    => new sfWidgetFormTextarea(),
      'awarded_by'             => new sfWidgetFormInputText(),
      'created_at'             => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                     => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'analysis_id'            => new sfValidatorInteger(),
      'analysis_medal_type_id' => new sfValidatorInteger(),
      'award_note_by_admin'    => new sfValidatorString(),
      'awarded_by'             => new sfValidatorInteger(),
      'created_at'             => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sbt_analysis_medal_details[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SbtAnalysisMedalDetails';
  }

}
