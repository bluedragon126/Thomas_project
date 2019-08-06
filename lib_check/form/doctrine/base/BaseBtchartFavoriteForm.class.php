<?php

/**
 * BtchartFavorite form base class.
 *
 * @method BtchartFavorite getObject() Returns the current form's model object
 *
 * @package    sisterbt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseBtchartFavoriteForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'user_id'     => new sfWidgetFormInputText(),
      'stock_id'    => new sfWidgetFormInputText(),
      'stock_type'  => new sfWidgetFormInputText(),
      'chart_type'  => new sfWidgetFormInputText(),
      'description' => new sfWidgetFormInputText(),
      'created_at'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'user_id'     => new sfValidatorInteger(),
      'stock_id'    => new sfValidatorInteger(),
      'stock_type'  => new sfValidatorInteger(),
      'chart_type'  => new sfValidatorInteger(),
      'description' => new sfValidatorString(array('max_length' => 200)),
      'created_at'  => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('btchart_favorite[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'BtchartFavorite';
  }

}
