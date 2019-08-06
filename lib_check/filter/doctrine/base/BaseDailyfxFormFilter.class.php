<?php

/**
 * Dailyfx filter form base class.
 *
 * @package    sisterbt
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseDailyfxFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'ad_date'        => new sfWidgetFormFilterInput(),
      'ad_time'        => new sfWidgetFormFilterInput(),
      'ad_currency'    => new sfWidgetFormFilterInput(),
      'ad_description' => new sfWidgetFormFilterInput(),
      'ad_importance'  => new sfWidgetFormFilterInput(),
      'ad_actual'      => new sfWidgetFormFilterInput(),
      'ad_forecast'    => new sfWidgetFormFilterInput(),
      'ad_previous'    => new sfWidgetFormFilterInput(),
      'ad_tmstamp'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'ad_tmzone'      => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'ad_date'        => new sfValidatorPass(array('required' => false)),
      'ad_time'        => new sfValidatorPass(array('required' => false)),
      'ad_currency'    => new sfValidatorPass(array('required' => false)),
      'ad_description' => new sfValidatorPass(array('required' => false)),
      'ad_importance'  => new sfValidatorPass(array('required' => false)),
      'ad_actual'      => new sfValidatorPass(array('required' => false)),
      'ad_forecast'    => new sfValidatorPass(array('required' => false)),
      'ad_previous'    => new sfValidatorPass(array('required' => false)),
      'ad_tmstamp'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'ad_tmzone'      => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('dailyfx_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Dailyfx';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'ad_date'        => 'Text',
      'ad_time'        => 'Text',
      'ad_currency'    => 'Text',
      'ad_description' => 'Text',
      'ad_importance'  => 'Text',
      'ad_actual'      => 'Text',
      'ad_forecast'    => 'Text',
      'ad_previous'    => 'Text',
      'ad_tmstamp'     => 'Date',
      'ad_tmzone'      => 'Text',
    );
  }
}
