<?php

/**
 * BtchartCompanyDetails filter form base class.
 *
 * @package    sisterbt
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseBtchartCompanyDetailsFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'company_type_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('BtchartCompanyCategory'), 'add_empty' => true)),
      'company_name'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'company_symbol'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'country'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'list'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'sector'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'active'          => new sfWidgetFormFilterInput(),
      'default_chart'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'object_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Objekt'), 'add_empty' => true)),
      'created_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'company_type_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('BtchartCompanyCategory'), 'column' => 'id')),
      'company_name'    => new sfValidatorPass(array('required' => false)),
      'company_symbol'  => new sfValidatorPass(array('required' => false)),
      'country'         => new sfValidatorPass(array('required' => false)),
      'list'            => new sfValidatorPass(array('required' => false)),
      'sector'          => new sfValidatorPass(array('required' => false)),
      'active'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'default_chart'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'object_id'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Objekt'), 'column' => 'object_id')),
      'created_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('btchart_company_details_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'BtchartCompanyDetails';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'company_type_id' => 'ForeignKey',
      'company_name'    => 'Text',
      'company_symbol'  => 'Text',
      'country'         => 'Text',
      'list'            => 'Text',
      'sector'          => 'Text',
      'active'          => 'Number',
      'default_chart'   => 'Number',
      'object_id'       => 'ForeignKey',
      'created_at'      => 'Date',
      'updated_at'      => 'Date',
    );
  }
}
