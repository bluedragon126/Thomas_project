<?php

/**
 * SbtAuthorMedalDetails filter form base class.
 *
 * @package    sisterbt
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseSbtAuthorMedalDetailsFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'author_id'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'author_medal_type_id' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'award_note_by_admin'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'awarded_by'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'author_id'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'author_medal_type_id' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'award_note_by_admin'  => new sfValidatorPass(array('required' => false)),
      'awarded_by'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('sbt_author_medal_details_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SbtAuthorMedalDetails';
  }

  public function getFields()
  {
    return array(
      'id'                   => 'Number',
      'author_id'            => 'Number',
      'author_medal_type_id' => 'Number',
      'award_note_by_admin'  => 'Text',
      'awarded_by'           => 'Number',
      'created_at'           => 'Date',
    );
  }
}
