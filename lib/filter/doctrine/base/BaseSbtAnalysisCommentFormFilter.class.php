<?php

/**
 * SbtAnalysisComment filter form base class.
 *
 * @package    sisterbt
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseSbtAnalysisCommentFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'analysis_comment' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'subject'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'analysis_id'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'comment_by'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'analysis_comment' => new sfValidatorPass(array('required' => false)),
      'subject'          => new sfValidatorPass(array('required' => false)),
      'analysis_id'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'comment_by'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('sbt_analysis_comment_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SbtAnalysisComment';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'analysis_comment' => 'Text',
      'subject'          => 'Text',
      'analysis_id'      => 'Number',
      'comment_by'       => 'Number',
      'created_at'       => 'Date',
    );
  }
}
