<?php

/**
 * Countries filter form base class.
 *
 * @package    sisterbt
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseCountriesFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'iso_code'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'country_name'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'country_region_id' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'iso_code'          => new sfValidatorPass(array('required' => false)),
      'country_name'      => new sfValidatorPass(array('required' => false)),
      'country_region_id' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('countries_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Countries';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'iso_code'          => 'Text',
      'country_name'      => 'Text',
      'country_region_id' => 'Number',
    );
  }
}
