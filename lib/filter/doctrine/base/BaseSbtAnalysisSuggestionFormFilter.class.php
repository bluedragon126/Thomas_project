<?php

/**
 * SbtAnalysisSuggestion filter form base class.
 *
 * @package    sisterbt
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseSbtAnalysisSuggestionFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'analysis_id'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'analysis_suggestion' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'analysis_status'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'suggestion_by'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'analysis_id'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'analysis_suggestion' => new sfValidatorPass(array('required' => false)),
      'analysis_status'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'suggestion_by'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('sbt_analysis_suggestion_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SbtAnalysisSuggestion';
  }

  public function getFields()
  {
    return array(
      'id'                  => 'Number',
      'analysis_id'         => 'Number',
      'analysis_suggestion' => 'Text',
      'analysis_status'     => 'Number',
      'suggestion_by'       => 'Number',
      'created_at'          => 'Date',
    );
  }
}
