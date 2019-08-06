<?php

/**
 * UserStatus form base class.
 *
 * @method UserStatus getObject() Returns the current form's model object
 *
 * @package    sisterbt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseUserStatusForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'userstatid' => new sfWidgetFormInputHidden(),
      'userstat'   => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'userstatid' => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'userstatid', 'required' => false)),
      'userstat'   => new sfValidatorString(array('max_length' => 10)),
    ));

    $this->widgetSchema->setNameFormat('user_status[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'UserStatus';
  }

}
