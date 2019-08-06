<?php

/**
 * BtchartType filter form base class.
 *
 * @package    sisterbt
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseBtchartTypeFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'chart_type_category'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'chart_type_name'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'chart_type_text'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'chart_type_short_name' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'chart_type_image'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'chart_type_file'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'chart_type_category'   => new sfValidatorPass(array('required' => false)),
      'chart_type_name'       => new sfValidatorPass(array('required' => false)),
      'chart_type_text'       => new sfValidatorPass(array('required' => false)),
      'chart_type_short_name' => new sfValidatorPass(array('required' => false)),
      'chart_type_image'      => new sfValidatorPass(array('required' => false)),
      'chart_type_file'       => new sfValidatorPass(array('required' => false)),
      'created_at'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('btchart_type_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'BtchartType';
  }

  public function getFields()
  {
    return array(
      'id'                    => 'Number',
      'chart_type_category'   => 'Text',
      'chart_type_name'       => 'Text',
      'chart_type_text'       => 'Text',
      'chart_type_short_name' => 'Text',
      'chart_type_image'      => 'Text',
      'chart_type_file'       => 'Text',
      'created_at'            => 'Date',
      'updated_at'            => 'Date',
    );
  }
}
