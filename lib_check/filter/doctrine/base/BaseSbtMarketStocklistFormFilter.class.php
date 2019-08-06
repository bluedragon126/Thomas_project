<?php

/**
 * SbtMarketStocklist filter form base class.
 *
 * @package    sisterbt
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseSbtMarketStocklistFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'sbt_market_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SbtMarket'), 'add_empty' => true)),
      'sbt_stocklist_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SbtStockList'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'sbt_market_id'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('SbtMarket'), 'column' => 'id')),
      'sbt_stocklist_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('SbtStockList'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('sbt_market_stocklist_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SbtMarketStocklist';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'sbt_market_id'    => 'ForeignKey',
      'sbt_stocklist_id' => 'ForeignKey',
    );
  }
}
