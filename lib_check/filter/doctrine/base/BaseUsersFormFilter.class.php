<?php

/**
 * Users filter form base class.
 *
 * @package    sisterbt
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseUsersFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'kundnr'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'password'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'abonid'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'userstatid'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'priv'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'year_of_birth' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'gender'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'firstname'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'lastname'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'co'            => new sfWidgetFormFilterInput(),
      'street'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'zipcode'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'city'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'land'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'email'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'phone'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'regdate'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'stopdate'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'betdate'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'inlog'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'inlogdate'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'kundnr'        => new sfValidatorPass(array('required' => false)),
      'password'      => new sfValidatorPass(array('required' => false)),
      'abonid'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'userstatid'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'priv'          => new sfValidatorPass(array('required' => false)),
      'year_of_birth' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'gender'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'firstname'     => new sfValidatorPass(array('required' => false)),
      'lastname'      => new sfValidatorPass(array('required' => false)),
      'co'            => new sfValidatorPass(array('required' => false)),
      'street'        => new sfValidatorPass(array('required' => false)),
      'zipcode'       => new sfValidatorPass(array('required' => false)),
      'city'          => new sfValidatorPass(array('required' => false)),
      'land'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'email'         => new sfValidatorPass(array('required' => false)),
      'phone'         => new sfValidatorPass(array('required' => false)),
      'regdate'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'stopdate'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'betdate'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'inlog'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'inlogdate'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('users_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Users';
  }

  public function getFields()
  {
    return array(
      'username'      => 'Text',
      'kundnr'        => 'Text',
      'password'      => 'Text',
      'abonid'        => 'Number',
      'userstatid'    => 'Number',
      'priv'          => 'Text',
      'year_of_birth' => 'Number',
      'gender'        => 'Number',
      'firstname'     => 'Text',
      'lastname'      => 'Text',
      'co'            => 'Text',
      'street'        => 'Text',
      'zipcode'       => 'Text',
      'city'          => 'Text',
      'land'          => 'Number',
      'email'         => 'Text',
      'phone'         => 'Text',
      'regdate'       => 'Date',
      'stopdate'      => 'Date',
      'betdate'       => 'Date',
      'inlog'         => 'Number',
      'inlogdate'     => 'Date',
    );
  }
}
