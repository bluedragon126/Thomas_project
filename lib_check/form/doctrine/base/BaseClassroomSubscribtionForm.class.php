<?php

/**
 * ClassroomSubscribtion form base class.
 *
 * @method ClassroomSubscribtion getObject() Returns the current form's model object
 *
 * @package    sisterbt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseClassroomSubscribtionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'user_id'        => new sfWidgetFormInputText(),
      'group_id'       => new sfWidgetFormInputText(),
      'topic_id'       => new sfWidgetFormInputText(),
      'mail_subscribe' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'user_id'        => new sfValidatorInteger(),
      'group_id'       => new sfValidatorInteger(),
      'topic_id'       => new sfValidatorInteger(),
      'mail_subscribe' => new sfValidatorInteger(),
    ));

    $this->widgetSchema->setNameFormat('classroom_subscribtion[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ClassroomSubscribtion';
  }

}
