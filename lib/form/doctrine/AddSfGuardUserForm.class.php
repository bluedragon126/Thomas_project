<?php

/**
 * SfGuardUser form.
 *
 * @package    sisterbt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AddSfGuardUserForm extends BaseSfGuardUserForm
{
  public function configure()
  {
  	$this->setWidgets(array(
      //'id'             => new sfWidgetFormInputHidden(),
      'username'       => new sfWidgetFormInputText(),
      'algorithm'      => new sfWidgetFormInputHidden(),
      'salt'           => new sfWidgetFormInputHidden(),
      'password'       => new sfWidgetFormInputPassword(),
      'created_at'     => new sfWidgetFormInputHidden(),
      //'last_login'     => new sfWidgetFormDateTime(),
      'is_active'      => new sfWidgetFormInputHidden(),
      'is_super_admin' => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      //'id'             => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'username'       => new sfValidatorString(array('max_length' => 128,'required' => false)),
      'algorithm'      => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'salt'           => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'password'       => new sfValidatorString(),
      'created_at'     => new sfValidatorDateTime(array('required' => false)),
      //'last_login'     => new sfValidatorDateTime(array('required' => false)),
      'is_active'      => new sfValidatorInteger(array('required' => false)),
      'is_super_admin' => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sf_guard_user[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

  }
}
