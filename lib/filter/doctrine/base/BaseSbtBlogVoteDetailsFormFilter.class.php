<?php

/**
 * SbtBlogVoteDetails filter form base class.
 *
 * @package    sisterbt
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseSbtBlogVoteDetailsFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'blog_id'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'user_id'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'vote_type_id' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'blog_id'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'user_id'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'vote_type_id' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('sbt_blog_vote_details_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SbtBlogVoteDetails';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'blog_id'      => 'Number',
      'user_id'      => 'Number',
      'vote_type_id' => 'Number',
      'created_at'   => 'Date',
    );
  }
}
