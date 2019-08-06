<?php

/**
 * SfGuardUserProfile form.
 *
 * @package    sisterbt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AddSfGuardUserProfileForm extends BaseSfGuardUserProfileForm
{
  public function configure()
  {
	$optionArr = array('0'=>'Nej','1'=>'Ja');
	
	$this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'user_id'       => new sfWidgetFormInputHidden(),
      'kundnr'        => new sfWidgetFormInputHidden(),
      'abonid'        => new sfWidgetFormInputHidden(),
      //'userstatid'    => new sfWidgetFormInputText(),
      //'priv'          => new sfWidgetFormInputText(),
      'year_of_birth' => new sfWidgetFormSelect(array('choices' => array())),
      //'gender'        => new sfWidgetFormChoice(array('choices'=>$genderArr,'expanded'=>true,'multiple'=>false)),
	  'gender'        => new sfWidgetFormInputHidden(),
      'username'      => new sfWidgetFormInputText(),//sfWidgetFormInputHidden(),//changed the input type to text by sandeep
      'signature'      => new sfWidgetFormInputText(),//added by sandeep
      'firstname'     => new sfWidgetFormInputText(),
      'lastname'      => new sfWidgetFormInputText(),
      //'co'            => new sfWidgetFormInputText(),
      'street'        => new sfWidgetFormInputText(),
      'zipcode'       => new sfWidgetFormInputText(),
      'city'          => new sfWidgetFormInputText(),
      'land'          => new sfWidgetFormSelect(array('choices' => array())),
      'email'         => new sfWidgetFormInputText(),
      'phone'         => new sfWidgetFormInputText(),
      'regdate'       => new sfWidgetFormInputHidden(),
      'stopdate'      => new sfWidgetFormInputHidden(),
      'sbt_activation_code'      => new sfWidgetFormInputHidden(),
      //'betdate'       => new sfWidgetFormDate(),
      //'inlog'         => new sfWidgetFormInputText(),
      //'inlogdate'     => new sfWidgetFormDateTime(),
      'activity_cnt'  => new sfWidgetFormInputHidden(),
	  'from_sbt'      => new sfWidgetFormInputHidden(),
      'sbt_active'    => new sfWidgetFormInputHidden(),
      'usernamealias' => new sfWidgetFormInputText(),
	  //'use_alias'    => new sfWidgetFormSelect(array('choices'=>$optionArr,'multiple'=>false)),
           'use_alias'    => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'user_id'       => new sfValidatorInteger(),
      'kundnr'        => new sfValidatorString(array('max_length' => 15, 'required' => false)),
      'abonid'        => new sfValidatorInteger(array('required' => false)),
     // 'userstatid'    => new sfValidatorInteger(array('required' => false)),
     // 'priv'          => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'year_of_birth' => new sfValidatorInteger(array('required' => false)),
      //'gender'        => new sfValidatorString(array('max_length' => 1, 'required' => false)),
	  'gender'        => new sfValidatorInteger(array('required' => false)),
      'username'      => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'signature'         => new sfValidatorString(array('max_length' => 32, 'required' => false)),//added by sandeep
      'firstname'     => new sfValidatorString(array('max_length' => 64)),
      'lastname'      => new sfValidatorString(array('max_length' => 64)),
      //'co'            => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'street'        => new sfValidatorString(array('max_length' => 50)),
      'zipcode'       => new sfValidatorString(array('max_length' => 10)),
      'city'          => new sfValidatorString(array('max_length' => 20)),
      'land'          => new sfValidatorString(array('required' => false)),
      'email'         => new sfValidatorString(),
      'phone'         => new sfValidatorString(array('max_length' => 32)),
      'regdate'       => new sfValidatorDateTime(array('required' => false)),
      'stopdate'      => new sfValidatorDate(array('required' => false)),
      //'betdate'       => new sfValidatorDate(array('required' => false)),
      //'inlog'         => new sfValidatorInteger(array('required' => false)),
      //'inlogdate'     => new sfValidatorDateTime(array('required' => false)),
	  'activity_cnt'      => new sfValidatorInteger(array('required' => false)),
	  'from_sbt'      => new sfValidatorInteger(array('required' => false)),
	  'sbt_active'      => new sfValidatorInteger(array('required' => false)),
	  'sbt_activation_code'   => new sfValidatorInteger(array('required' => false)),
	  'usernamealias'      => new sfValidatorString(array('required' => false)),
	  //'use_alias'        => new sfValidatorString(array('max_length' => 1, 'required' => false)),
          'use_alias'      => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sf_guard_user_profile[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);
	
	$this->validatorSchema->setPostValidator(new sfValidatorAnd(array(new sfValidatorDoctrineUnique(array('model' => 'sfGuardUserProfile', 'column' => array('email')), array('invalid' => 'This email already exists.')))));
	

	if (!$this->getObject()->isNew())
	{
		unset(
		  $this['usernamealias'],
		  $this['use_alias']
		);

	} 
  }
}
