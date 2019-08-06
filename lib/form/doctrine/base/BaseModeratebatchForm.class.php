<?php

/**
 * Moderatebatch form base class.
 *
 * @method Moderatebatch getObject() Returns the current form's model object
 *
 * @package    sisterbt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseModeratebatchForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'currentcnt'     => new sfWidgetFormInputText(),
      'currentmails'   => new sfWidgetFormInputText(),
      'start_time'     => new sfWidgetFormDateTime(),
      'end_time'       => new sfWidgetFormDateTime(),
      'process_status' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'currentcnt'     => new sfValidatorInteger(),
      'currentmails'   => new sfValidatorString(array('max_length' => 255)),
      'start_time'     => new sfValidatorDateTime(),
      'end_time'       => new sfValidatorDateTime(),
      'process_status' => new sfValidatorInteger(),
    ));

    $this->widgetSchema->setNameFormat('moderatebatch[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Moderatebatch';
  }

}
