<?php

/**
 * SbtFavorite filter form base class.
 *
 * @package    sisterbt
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseSbtFavoriteFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'user_id'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'f_type'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'f_id'           => new sfWidgetFormFilterInput(),
      'f_name'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'f_notification' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'user_id'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'f_type'         => new sfValidatorPass(array('required' => false)),
      'f_id'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'f_name'         => new sfValidatorPass(array('required' => false)),
      'f_notification' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('sbt_favorite_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SbtFavorite';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'user_id'        => 'Number',
      'f_type'         => 'Text',
      'f_id'           => 'Number',
      'f_name'         => 'Text',
      'f_notification' => 'Number',
      'created_at'     => 'Date',
    );
  }
}
