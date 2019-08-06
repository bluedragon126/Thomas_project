<?php

/**
 * SfGuardUserProfile form base class.
 *
 * @method SfGuardUserProfile getObject() Returns the current form's model object
 *
 * @package    sisterbt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseSfGuardUserProfileForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                  => new sfWidgetFormInputHidden(),
      'user_id'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => true)),
      'kundnr'              => new sfWidgetFormInputText(),
      'abonid'              => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Abon'), 'add_empty' => false)),
      'userstatid'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('UserStatus'), 'add_empty' => false)),
      'priv'                => new sfWidgetFormInputText(),
      'year_of_birth'       => new sfWidgetFormInputText(),
      'gender'              => new sfWidgetFormInputText(),
      'username'            => new sfWidgetFormInputText(),
      'firstname'           => new sfWidgetFormInputText(),
      'lastname'            => new sfWidgetFormInputText(),
      'co'                  => new sfWidgetFormInputText(),
      'street'              => new sfWidgetFormInputText(),
      'zipcode'             => new sfWidgetFormInputText(),
      'city'                => new sfWidgetFormInputText(),
      'land'                => new sfWidgetFormInputText(),
      'email'               => new sfWidgetFormInputText(),
      'phone'               => new sfWidgetFormInputText(),
      'signature'           => new sfWidgetFormInputText(),
      'regdate'             => new sfWidgetFormDateTime(),
      'stopdate'            => new sfWidgetFormDate(),
      'betdate'             => new sfWidgetFormDate(),
      'inlog'               => new sfWidgetFormInputText(),
      'inlogdate'           => new sfWidgetFormDateTime(),
      'activity_cnt'        => new sfWidgetFormInputText(),
      'from_sbt'            => new sfWidgetFormInputText(),
      'sbt_active'          => new sfWidgetFormInputText(),
      'sbt_activation_code' => new sfWidgetFormInputText(),
      'hide_profile'        => new sfWidgetFormInputText(),
      'usernamealias'       => new sfWidgetFormInputText(),
      'use_alias'           => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                  => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'user_id'             => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'required' => false)),
      'kundnr'              => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'abonid'              => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Abon'), 'required' => false)),
      'userstatid'          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('UserStatus'), 'required' => false)),
      'priv'                => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'year_of_birth'       => new sfValidatorInteger(array('required' => false)),
      'gender'              => new sfValidatorInteger(array('required' => false)),
      'username'            => new sfValidatorString(array('max_length' => 128)),
      'firstname'           => new sfValidatorString(array('max_length' => 64, 'required' => false)),
      'lastname'            => new sfValidatorString(array('max_length' => 64, 'required' => false)),
      'co'                  => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'street'              => new sfValidatorString(array('max_length' => 50)),
      'zipcode'             => new sfValidatorString(array('max_length' => 6)),
      'city'                => new sfValidatorString(array('max_length' => 20)),
      'land'                => new sfValidatorInteger(array('required' => false)),
      'email'               => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'phone'               => new sfValidatorString(array('max_length' => 32, 'required' => false)),
      'signature'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'regdate'             => new sfValidatorDateTime(array('required' => false)),
      'stopdate'            => new sfValidatorDate(array('required' => false)),
      'betdate'             => new sfValidatorDate(array('required' => false)),
      'inlog'               => new sfValidatorInteger(array('required' => false)),
      'inlogdate'           => new sfValidatorDateTime(array('required' => false)),
      'activity_cnt'        => new sfValidatorInteger(array('required' => false)),
      'from_sbt'            => new sfValidatorInteger(array('required' => false)),
      'sbt_active'          => new sfValidatorInteger(array('required' => false)),
      'sbt_activation_code' => new sfValidatorInteger(array('required' => false)),
      'hide_profile'        => new sfValidatorInteger(array('required' => false)),
      'usernamealias'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'use_alias'           => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sf_guard_user_profile[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SfGuardUserProfile';
  }

}
