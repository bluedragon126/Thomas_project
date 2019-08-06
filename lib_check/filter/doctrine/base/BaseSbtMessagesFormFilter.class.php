<?php

/**
 * SbtMessages filter form base class.
 *
 * @package    sisterbt
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseSbtMessagesFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'message_to'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SfGuardUserProfile'), 'add_empty' => true)),
      'message_from'   => new sfWidgetFormFilterInput(),
      'message_detail' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'message_to'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('SfGuardUserProfile'), 'column' => 'id')),
      'message_from'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'message_detail' => new sfValidatorPass(array('required' => false)),
      'created_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('sbt_messages_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SbtMessages';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'message_to'     => 'ForeignKey',
      'message_from'   => 'Number',
      'message_detail' => 'Text',
      'created_at'     => 'Date',
    );
  }
}
