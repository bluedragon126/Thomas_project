<?php

/**
 * SbtAnalysisComment form base class.
 *
 * @method SbtAnalysisComment getObject() Returns the current form's model object
 *
 * @package    sisterbt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseSbtAnalysisCommentForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'analysis_comment' => new sfWidgetFormTextarea(),
      'subject'          => new sfWidgetFormTextarea(),
      'analysis_id'      => new sfWidgetFormInputText(),
      'comment_by'       => new sfWidgetFormInputText(),
      'created_at'       => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'analysis_comment' => new sfValidatorString(),
      'subject'          => new sfValidatorString(),
      'analysis_id'      => new sfValidatorInteger(array('required' => false)),
      'comment_by'       => new sfValidatorInteger(array('required' => false)),
      'created_at'       => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sbt_analysis_comment[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SbtAnalysisComment';
  }

}
