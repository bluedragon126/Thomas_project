<?php

/**
 * ClassroomSubscribtion filter form base class.
 *
 * @package    sisterbt
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseClassroomSubscribtionFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'user_id'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'group_id'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'topic_id'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'mail_subscribe' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'user_id'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'group_id'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'topic_id'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'mail_subscribe' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('classroom_subscribtion_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ClassroomSubscribtion';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'user_id'        => 'Number',
      'group_id'       => 'Number',
      'topic_id'       => 'Number',
      'mail_subscribe' => 'Number',
    );
  }
}
