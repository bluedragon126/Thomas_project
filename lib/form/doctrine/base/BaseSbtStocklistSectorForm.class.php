<?php

/**
 * SbtStocklistSector form base class.
 *
 * @method SbtStocklistSector getObject() Returns the current form's model object
 *
 * @package    sisterbt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseSbtStocklistSectorForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'sbt_stocklist_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SbtStockList'), 'add_empty' => false)),
      'sbt_sector_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SbtSector'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'sbt_stocklist_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('SbtStockList'))),
      'sbt_sector_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('SbtSector'))),
    ));

    $this->widgetSchema->setNameFormat('sbt_stocklist_sector[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SbtStocklistSector';
  }

}
