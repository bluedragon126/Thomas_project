<?php

/**
 * SbtMessages form base class.
 *
 * @method SbtMessages getObject() Returns the current form's model object
 *
 * @package    sisterbt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseSbtMessagesForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'message_to'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SfGuardUserProfile'), 'add_empty' => true)),
      'message_from'   => new sfWidgetFormInputText(),
      'message_detail' => new sfWidgetFormTextarea(),
      'created_at'     => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'message_to'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('SfGuardUserProfile'), 'required' => false)),
      'message_from'   => new sfValidatorInteger(array('required' => false)),
      'message_detail' => new sfValidatorString(),
      'created_at'     => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sbt_messages[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SbtMessages';
  }

}
