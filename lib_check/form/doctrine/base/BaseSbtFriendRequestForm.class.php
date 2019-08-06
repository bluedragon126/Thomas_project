<?php

/**
 * SbtFriendRequest form base class.
 *
 * @method SbtFriendRequest getObject() Returns the current form's model object
 *
 * @package    sisterbt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseSbtFriendRequestForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'contactor_id' => new sfWidgetFormInputText(),
      'contactee_id' => new sfWidgetFormInputText(),
      'message'      => new sfWidgetFormTextarea(),
      'status'       => new sfWidgetFormInputText(),
      'created_at'   => new sfWidgetFormDateTime(),
      'updated_at'   => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'contactor_id' => new sfValidatorInteger(array('required' => false)),
      'contactee_id' => new sfValidatorInteger(array('required' => false)),
      'message'      => new sfValidatorString(),
      'status'       => new sfValidatorInteger(array('required' => false)),
      'created_at'   => new sfValidatorDateTime(array('required' => false)),
      'updated_at'   => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sbt_friend_request[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SbtFriendRequest';
  }

}
