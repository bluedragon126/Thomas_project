<?php

/**
 * Subscription filter form base class.
 *
 * @package    sisterbt
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseSubscriptionFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'purchase_id'                => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Purchase'), 'add_empty' => true)),
      'product_id'                 => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('BtShopArticle'), 'add_empty' => true)),
      'product_type_id'            => new sfWidgetFormFilterInput(),
      'btchart_type_id'            => new sfWidgetFormFilterInput(),
      'articleornot'               => new sfWidgetFormFilterInput(),
      'subscription_duration'      => new sfWidgetFormFilterInput(),
      'subscription_duration_unit' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'scheme_name'                => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'start_date'                 => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'end_date'                   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'created_at'                 => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'purchase_id'                => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Purchase'), 'column' => 'id')),
      'product_id'                 => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('BtShopArticle'), 'column' => 'id')),
      'product_type_id'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'btchart_type_id'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'articleornot'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'subscription_duration'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'subscription_duration_unit' => new sfValidatorPass(array('required' => false)),
      'scheme_name'                => new sfValidatorPass(array('required' => false)),
      'start_date'                 => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'end_date'                   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'created_at'                 => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('subscription_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Subscription';
  }

  public function getFields()
  {
    return array(
      'id'                         => 'Number',
      'purchase_id'                => 'ForeignKey',
      'product_id'                 => 'ForeignKey',
      'product_type_id'            => 'Number',
      'btchart_type_id'            => 'Number',
      'articleornot'               => 'Number',
      'subscription_duration'      => 'Number',
      'subscription_duration_unit' => 'Text',
      'scheme_name'                => 'Text',
      'start_date'                 => 'Date',
      'end_date'                   => 'Date',
      'created_at'                 => 'Date',
    );
  }
}
