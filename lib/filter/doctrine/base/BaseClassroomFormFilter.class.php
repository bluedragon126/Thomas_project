<?php

/**
 * Classroom filter form base class.
 *
 * @package    sisterbt
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseClassroomFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'creator'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'title'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'textarea'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'post_date'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'other_dates' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'views'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'reply_post'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'topic'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'parent_id'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'group_id'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'creator'     => new sfValidatorPass(array('required' => false)),
      'title'       => new sfValidatorPass(array('required' => false)),
      'textarea'    => new sfValidatorPass(array('required' => false)),
      'post_date'   => new sfValidatorPass(array('required' => false)),
      'other_dates' => new sfValidatorPass(array('required' => false)),
      'views'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'reply_post'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'topic'       => new sfValidatorPass(array('required' => false)),
      'parent_id'   => new sfValidatorPass(array('required' => false)),
      'group_id'    => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('classroom_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Classroom';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'creator'     => 'Text',
      'title'       => 'Text',
      'textarea'    => 'Text',
      'post_date'   => 'Text',
      'other_dates' => 'Text',
      'views'       => 'Number',
      'reply_post'  => 'Number',
      'topic'       => 'Text',
      'parent_id'   => 'Text',
      'group_id'    => 'Text',
    );
  }
}
