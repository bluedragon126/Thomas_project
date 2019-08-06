<?php

/**
 * SbtCombinedAnalysisData form base class.
 *
 * @method SbtCombinedAnalysisData getObject() Returns the current form's model object
 *
 * @package    sisterbt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseSbtCombinedAnalysisDataForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                 => new sfWidgetFormInputHidden(),
      'analysis_id'        => new sfWidgetFormInputText(),
      'combined_usernames' => new sfWidgetFormTextarea(),
      'created_at'         => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                 => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'analysis_id'        => new sfValidatorInteger(),
      'combined_usernames' => new sfValidatorString(),
      'created_at'         => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sbt_combined_analysis_data[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SbtCombinedAnalysisData';
  }

}
