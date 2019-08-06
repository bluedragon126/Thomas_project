<?php

/**
 * SbtAnalysisMedalDetails form.
 *
 * @package    sisterbt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class SbtAnalysisMedalDetailsForm extends BaseSbtAnalysisMedalDetailsForm
{
  public function configure()
  {
    $this->setWidgets(array(
      'analysis_id'            => new sfWidgetFormInputHidden(),
      'analysis_medal_type_id' => new sfWidgetFormInputHidden(),
      'award_note_by_admin'    => new sfWidgetFormTextarea(),
      'awarded_by'             => new sfWidgetFormInputHidden(),
      'created_at'             => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'analysis_id'            => new sfValidatorInteger(array('required' => false)),
      'analysis_medal_type_id' => new sfValidatorInteger(array('required' => false)),
      'award_note_by_admin'    => new sfValidatorString(array('required' => false)),
      'awarded_by'             => new sfValidatorInteger(array('required' => false)),
      'created_at'             => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sbt_analysis_medal_details[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);
  }
}
