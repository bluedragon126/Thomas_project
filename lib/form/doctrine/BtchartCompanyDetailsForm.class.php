<?php

/**
 * BtchartCompanyDetails form.
 *
 * @package    sisterbt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class BtchartCompanyDetailsForm extends BaseBtchartCompanyDetailsForm
{
  public function configure()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'company_type_id' => new sfWidgetFormSelect(array('choices' => array())),
      'company_name'    => new sfWidgetFormInputText(),
      'company_symbol'  => new sfWidgetFormInputText(),
      'country'         => new sfWidgetFormInputText(),
      'list'            => new sfWidgetFormInputText(),
      'sector'          => new sfWidgetFormInputText(),
      'object_id'    => new sfWidgetFormSelect(array('choices' => array())),//code change by sandeep
      'active'          => new sfWidgetFormInputText(),      
      'created_at'      => new sfWidgetFormDateTime(),
      'updated_at'      => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'company_type_id' => new sfValidatorInteger(array('required' => false)),
      'company_name'    => new sfValidatorString(array('max_length' => 100)),
      'company_symbol'  => new sfValidatorString(array('max_length' => 100)),
      'country'         => new sfValidatorString(array('max_length' => 100)),
      'list'            => new sfValidatorString(array('max_length' => 100)),
      'sector'          => new sfValidatorString(array('max_length' => 100)),
      'object_id'    => new sfValidatorInteger(array('required' => false)),//code change by sandeep
      'active'          => new sfValidatorInteger(array('required' => false)),      
      'created_at'      => new sfValidatorDateTime(array('required' => false)),
      'updated_at'      => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('btchart_company_details[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();
  }
}
