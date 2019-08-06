<?php

/**
 * Countries form base class.
 *
 * @method Countries getObject() Returns the current form's model object
 *
 * @package    sisterbt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseCountriesForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'iso_code'          => new sfWidgetFormInputText(),
      'country_name'      => new sfWidgetFormInputText(),
      'country_region_id' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'iso_code'          => new sfValidatorString(array('max_length' => 2)),
      'country_name'      => new sfValidatorString(array('max_length' => 80)),
      'country_region_id' => new sfValidatorInteger(),
    ));

    $this->widgetSchema->setNameFormat('countries[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Countries';
  }

}
