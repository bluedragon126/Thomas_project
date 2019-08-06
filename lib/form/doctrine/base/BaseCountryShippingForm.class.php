<?php

/**
 * CountryShipping form base class.
 *
 * @method CountryShipping getObject() Returns the current form's model object
 *
 * @package    sisterbt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseCountryShippingForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'country_region_id' => new sfWidgetFormInputText(),
      'item_weight'       => new sfWidgetFormInputText(),
      'price'             => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'country_region_id' => new sfValidatorInteger(),
      'item_weight'       => new sfValidatorInteger(),
      'price'             => new sfValidatorInteger(),
    ));

    $this->widgetSchema->setNameFormat('country_shipping[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CountryShipping';
  }

}
