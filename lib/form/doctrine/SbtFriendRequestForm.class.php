<?php

/**
 * SbtFriendRequest form.
 *
 * @package    sisterbt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class SbtFriendRequestForm extends BaseSbtFriendRequestForm
{
  public function configure()
  {
    $this->setWidgets(array(
      //'id'           => new sfWidgetFormInputHidden(),
      'contactor_id' => new sfWidgetFormInputHidden(),
      'contactee_id' => new sfWidgetFormInputHidden(),
      'message'      => new sfWidgetFormTextarea(),
      'status'       => new sfWidgetFormInputHidden(),
      'created_at'   => new sfWidgetFormInputHidden(),
      'updated_at'   => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'contactor_id' => new sfValidatorInteger(array('required' => false)),
      'contactee_id' => new sfValidatorInteger(array('required' => false)),
      'message'      => new sfValidatorString(array('required' => false)),
      'status'       => new sfValidatorInteger(array('required' => false)),
      'created_at'   => new sfValidatorDateTime(array('required' => false)),
      'updated_at'   => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('friend_request[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);
  }
}
