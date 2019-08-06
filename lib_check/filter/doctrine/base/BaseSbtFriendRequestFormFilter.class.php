<?php

/**
 * SbtFriendRequest filter form base class.
 *
 * @package    sisterbt
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseSbtFriendRequestFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'contactor_id' => new sfWidgetFormFilterInput(),
      'contactee_id' => new sfWidgetFormFilterInput(),
      'message'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'status'       => new sfWidgetFormFilterInput(),
      'created_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'contactor_id' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'contactee_id' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'message'      => new sfValidatorPass(array('required' => false)),
      'status'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('sbt_friend_request_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SbtFriendRequest';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'contactor_id' => 'Number',
      'contactee_id' => 'Number',
      'message'      => 'Text',
      'status'       => 'Number',
      'created_at'   => 'Date',
      'updated_at'   => 'Date',
    );
  }
}
