<?php

/**
 * SbtStocklistSector filter form base class.
 *
 * @package    sisterbt
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseSbtStocklistSectorFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'sbt_stocklist_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SbtStockList'), 'add_empty' => true)),
      'sbt_sector_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SbtSector'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'sbt_stocklist_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('SbtStockList'), 'column' => 'id')),
      'sbt_sector_id'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('SbtSector'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('sbt_stocklist_sector_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SbtStocklistSector';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'sbt_stocklist_id' => 'ForeignKey',
      'sbt_sector_id'    => 'ForeignKey',
    );
  }
}
