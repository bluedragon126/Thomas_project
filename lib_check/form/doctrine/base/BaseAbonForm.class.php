<?php

/**
 * Abon form base class.
 *
 * @method Abon getObject() Returns the current form's model object
 *
 * @package    sisterbt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseAbonForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'abonid'    => new sfWidgetFormInputHidden(),
      'abon_name' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'abonid'    => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'abonid', 'required' => false)),
      'abon_name' => new sfValidatorString(array('max_length' => 10)),
    ));

    $this->widgetSchema->setNameFormat('abon[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Abon';
  }

}
