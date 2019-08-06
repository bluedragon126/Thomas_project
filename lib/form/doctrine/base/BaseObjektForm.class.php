<?php

/**
 * Objekt form base class.
 *
 * @method Objekt getObject() Returns the current form's model object
 *
 * @package    sisterbt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseObjektForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'object_id'      => new sfWidgetFormInputHidden(),
      'object_name'    => new sfWidgetFormInputText(),
      'object_date'    => new sfWidgetFormDate(),
      'object_country' => new sfWidgetFormInputText(),
      'object_logo'    => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'object_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'object_id', 'required' => false)),
      'object_name'    => new sfValidatorString(array('max_length' => 20)),
      'object_date'    => new sfValidatorDate(array('required' => false)),
      'object_country' => new sfValidatorString(array('max_length' => 3)),
      'object_logo'    => new sfValidatorString(array('max_length' => 10)),
    ));

    $this->widgetSchema->setNameFormat('objekt[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Objekt';
  }

}
