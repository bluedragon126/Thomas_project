<?php

/**
 * SbtObject filter form base class.
 *
 * @package    sisterbt
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseSbtObjectFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'object_name'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'object_short_name' => new sfWidgetFormFilterInput(),
      'market_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SbtMarket'), 'add_empty' => true)),
      'stocklist_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SbtStockList'), 'add_empty' => true)),
      'sector_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SbtSector'), 'add_empty' => true)),
      'type_id'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SbtArticleType'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'object_name'       => new sfValidatorPass(array('required' => false)),
      'object_short_name' => new sfValidatorPass(array('required' => false)),
      'market_id'         => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('SbtMarket'), 'column' => 'id')),
      'stocklist_id'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('SbtStockList'), 'column' => 'id')),
      'sector_id'         => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('SbtSector'), 'column' => 'id')),
      'type_id'           => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('SbtArticleType'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('sbt_object_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SbtObject';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'object_name'       => 'Text',
      'object_short_name' => 'Text',
      'market_id'         => 'ForeignKey',
      'stocklist_id'      => 'ForeignKey',
      'sector_id'         => 'ForeignKey',
      'type_id'           => 'ForeignKey',
    );
  }
}
