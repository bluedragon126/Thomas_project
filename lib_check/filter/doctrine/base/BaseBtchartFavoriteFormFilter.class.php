<?php

/**
 * BtchartFavorite filter form base class.
 *
 * @package    sisterbt
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseBtchartFavoriteFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'user_id'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'stock_id'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'stock_type'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'chart_type'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'description' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'user_id'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'stock_id'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'stock_type'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'chart_type'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'description' => new sfValidatorPass(array('required' => false)),
      'created_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('btchart_favorite_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'BtchartFavorite';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'user_id'     => 'Number',
      'stock_id'    => 'Number',
      'stock_type'  => 'Number',
      'chart_type'  => 'Number',
      'description' => 'Text',
      'created_at'  => 'Date',
    );
  }
}
