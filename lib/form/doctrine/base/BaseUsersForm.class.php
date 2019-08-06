<?php

/**
 * Users form base class.
 *
 * @method Users getObject() Returns the current form's model object
 *
 * @package    sisterbt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseUsersForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'username'      => new sfWidgetFormInputHidden(),
      'kundnr'        => new sfWidgetFormInputText(),
      'password'      => new sfWidgetFormInputText(),
      'abonid'        => new sfWidgetFormInputText(),
      'userstatid'    => new sfWidgetFormInputText(),
      'priv'          => new sfWidgetFormInputText(),
      'year_of_birth' => new sfWidgetFormInputText(),
      'gender'        => new sfWidgetFormInputText(),
      'firstname'     => new sfWidgetFormInputText(),
      'lastname'      => new sfWidgetFormInputText(),
      'co'            => new sfWidgetFormInputText(),
      'street'        => new sfWidgetFormInputText(),
      'zipcode'       => new sfWidgetFormInputText(),
      'city'          => new sfWidgetFormInputText(),
      'land'          => new sfWidgetFormInputText(),
      'email'         => new sfWidgetFormInputText(),
      'phone'         => new sfWidgetFormInputText(),
      'regdate'       => new sfWidgetFormDateTime(),
      'stopdate'      => new sfWidgetFormDate(),
      'betdate'       => new sfWidgetFormDate(),
      'inlog'         => new sfWidgetFormInputText(),
      'inlogdate'     => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'username'      => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'username', 'required' => false)),
      'kundnr'        => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'password'      => new sfValidatorString(array('max_length' => 32, 'required' => false)),
      'abonid'        => new sfValidatorInteger(array('required' => false)),
      'userstatid'    => new sfValidatorInteger(array('required' => false)),
      'priv'          => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'year_of_birth' => new sfValidatorInteger(array('required' => false)),
      'gender'        => new sfValidatorInteger(array('required' => false)),
      'firstname'     => new sfValidatorString(array('max_length' => 64, 'required' => false)),
      'lastname'      => new sfValidatorString(array('max_length' => 64, 'required' => false)),
      'co'            => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'street'        => new sfValidatorString(array('max_length' => 50)),
      'zipcode'       => new sfValidatorString(array('max_length' => 6)),
      'city'          => new sfValidatorString(array('max_length' => 20)),
      'land'          => new sfValidatorInteger(array('required' => false)),
      'email'         => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'phone'         => new sfValidatorString(array('max_length' => 32, 'required' => false)),
      'regdate'       => new sfValidatorDateTime(array('required' => false)),
      'stopdate'      => new sfValidatorDate(array('required' => false)),
      'betdate'       => new sfValidatorDate(array('required' => false)),
      'inlog'         => new sfValidatorInteger(array('required' => false)),
      'inlogdate'     => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('users[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Users';
  }

}
