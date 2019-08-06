<?php

/**
 * SbtVoteDetails filter form base class.
 *
 * @package    sisterbt
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseSbtVoteDetailsFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'author_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => true)),
      'type_id'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'art_blog_id'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'user_id'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'vote_type_id' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'author_id'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('sfGuardUser'), 'column' => 'id')),
      'type_id'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'art_blog_id'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'user_id'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'vote_type_id' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('sbt_vote_details_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SbtVoteDetails';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'author_id'    => 'ForeignKey',
      'type_id'      => 'Number',
      'art_blog_id'  => 'Number',
      'user_id'      => 'Number',
      'vote_type_id' => 'Number',
      'created_at'   => 'Date',
    );
  }
}
