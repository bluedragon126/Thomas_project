<?php

/**
 * SfGuardUserProfile filter form base class.
 *
 * @package    sisterbt
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseSfGuardUserProfileFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'user_id'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => true)),
      'kundnr'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'abonid'              => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Abon'), 'add_empty' => true)),
      'userstatid'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('UserStatus'), 'add_empty' => true)),
      'priv'                => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'year_of_birth'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'gender'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'username'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'firstname'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'lastname'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'co'                  => new sfWidgetFormFilterInput(),
      'street'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'zipcode'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'city'                => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'land'                => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'email'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'phone'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'signature'           => new sfWidgetFormFilterInput(),
      'regdate'             => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'stopdate'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'betdate'             => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'inlog'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'inlogdate'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'activity_cnt'        => new sfWidgetFormFilterInput(),
      'from_sbt'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'sbt_active'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'sbt_activation_code' => new sfWidgetFormFilterInput(),
      'hide_profile'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'usernamealias'       => new sfWidgetFormFilterInput(),
      'use_alias'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'user_id'             => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('sfGuardUser'), 'column' => 'id')),
      'kundnr'              => new sfValidatorPass(array('required' => false)),
      'abonid'              => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Abon'), 'column' => 'abonid')),
      'userstatid'          => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('UserStatus'), 'column' => 'userstatid')),
      'priv'                => new sfValidatorPass(array('required' => false)),
      'year_of_birth'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'gender'              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'username'            => new sfValidatorPass(array('required' => false)),
      'firstname'           => new sfValidatorPass(array('required' => false)),
      'lastname'            => new sfValidatorPass(array('required' => false)),
      'co'                  => new sfValidatorPass(array('required' => false)),
      'street'              => new sfValidatorPass(array('required' => false)),
      'zipcode'             => new sfValidatorPass(array('required' => false)),
      'city'                => new sfValidatorPass(array('required' => false)),
      'land'                => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'email'               => new sfValidatorPass(array('required' => false)),
      'phone'               => new sfValidatorPass(array('required' => false)),
      'signature'           => new sfValidatorPass(array('required' => false)),
      'regdate'             => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'stopdate'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'betdate'             => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'inlog'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'inlogdate'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'activity_cnt'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'from_sbt'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'sbt_active'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'sbt_activation_code' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'hide_profile'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'usernamealias'       => new sfValidatorPass(array('required' => false)),
      'use_alias'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('sf_guard_user_profile_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SfGuardUserProfile';
  }

  public function getFields()
  {
    return array(
      'id'                  => 'Number',
      'user_id'             => 'ForeignKey',
      'kundnr'              => 'Text',
      'abonid'              => 'ForeignKey',
      'userstatid'          => 'ForeignKey',
      'priv'                => 'Text',
      'year_of_birth'       => 'Number',
      'gender'              => 'Number',
      'username'            => 'Text',
      'firstname'           => 'Text',
      'lastname'            => 'Text',
      'co'                  => 'Text',
      'street'              => 'Text',
      'zipcode'             => 'Text',
      'city'                => 'Text',
      'land'                => 'Number',
      'email'               => 'Text',
      'phone'               => 'Text',
      'signature'           => 'Text',
      'regdate'             => 'Date',
      'stopdate'            => 'Date',
      'betdate'             => 'Date',
      'inlog'               => 'Number',
      'inlogdate'           => 'Date',
      'activity_cnt'        => 'Number',
      'from_sbt'            => 'Number',
      'sbt_active'          => 'Number',
      'sbt_activation_code' => 'Number',
      'hide_profile'        => 'Number',
      'usernamealias'       => 'Text',
      'use_alias'           => 'Number',
    );
  }
}
