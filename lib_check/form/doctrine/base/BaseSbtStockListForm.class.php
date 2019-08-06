<?php

/**
 * SbtStockList form base class.
 *
 * @method SbtStockList getObject() Returns the current form's model object
 *
 * @package    sisterbt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseSbtStockListForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'stock_name'    => new sfWidgetFormInputText(),
      'display_order' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'stock_name'    => new sfValidatorString(array('max_length' => 100)),
      'display_order' => new sfValidatorInteger(),
    ));

    $this->widgetSchema->setNameFormat('sbt_stock_list[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SbtStockList';
  }

}
