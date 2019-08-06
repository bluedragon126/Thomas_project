<?php

/**
 * SbtObject form base class.
 *
 * @method SbtObject getObject() Returns the current form's model object
 *
 * @package    sisterbt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseSbtObjectForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'object_name'       => new sfWidgetFormInputText(),
      'object_short_name' => new sfWidgetFormInputText(),
      'market_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SbtMarket'), 'add_empty' => true)),
      'stocklist_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SbtStockList'), 'add_empty' => true)),
      'sector_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SbtSector'), 'add_empty' => true)),
      'type_id'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SbtArticleType'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'object_name'       => new sfValidatorString(array('max_length' => 100)),
      'object_short_name' => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'market_id'         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('SbtMarket'), 'required' => false)),
      'stocklist_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('SbtStockList'), 'required' => false)),
      'sector_id'         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('SbtSector'), 'required' => false)),
      'type_id'           => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('SbtArticleType'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sbt_object[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SbtObject';
  }

}
