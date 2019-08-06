<?php

/**
 * CountryShipping filter form base class.
 *
 * @package    sisterbt
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseCountryShippingFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'country_region_id' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'item_weight'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'price'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'country_region_id' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'item_weight'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'price'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('country_shipping_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CountryShipping';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'country_region_id' => 'Number',
      'item_weight'       => 'Number',
      'price'             => 'Number',
    );
  }
}
