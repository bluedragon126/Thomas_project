<?php

/**
 * BtchartCompanyDetails form base class.
 *
 * @method BtchartCompanyDetails getObject() Returns the current form's model object
 *
 * @package    sisterbt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseBtchartCompanyDetailsForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'company_type_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('BtchartCompanyCategory'), 'add_empty' => true)),
      'company_name'    => new sfWidgetFormInputText(),
      'company_symbol'  => new sfWidgetFormInputText(),
      'country'         => new sfWidgetFormInputText(),
      'list'            => new sfWidgetFormInputText(),
      'sector'          => new sfWidgetFormInputText(),
      'active'          => new sfWidgetFormInputText(),
      'default_chart'   => new sfWidgetFormInputText(),
      'object_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Objekt'), 'add_empty' => false)),
      'created_at'      => new sfWidgetFormDateTime(),
      'updated_at'      => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'company_type_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('BtchartCompanyCategory'), 'required' => false)),
      'company_name'    => new sfValidatorString(array('max_length' => 100)),
      'company_symbol'  => new sfValidatorString(array('max_length' => 100)),
      'country'         => new sfValidatorString(array('max_length' => 100)),
      'list'            => new sfValidatorString(array('max_length' => 100)),
      'sector'          => new sfValidatorString(array('max_length' => 100)),
      'active'          => new sfValidatorInteger(array('required' => false)),
      'default_chart'   => new sfValidatorInteger(),
      'object_id'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Objekt'), 'required' => false)),
      'created_at'      => new sfValidatorDateTime(array('required' => false)),
      'updated_at'      => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('btchart_company_details[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'BtchartCompanyDetails';
  }

}
