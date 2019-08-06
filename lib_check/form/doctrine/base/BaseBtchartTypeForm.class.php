<?php

/**
 * BtchartType form base class.
 *
 * @method BtchartType getObject() Returns the current form's model object
 *
 * @package    sisterbt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseBtchartTypeForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                    => new sfWidgetFormInputHidden(),
      'chart_type_category'   => new sfWidgetFormInputText(),
      'chart_type_name'       => new sfWidgetFormInputText(),
      'chart_type_text'       => new sfWidgetFormInputText(),
      'chart_type_short_name' => new sfWidgetFormInputText(),
      'chart_type_image'      => new sfWidgetFormInputText(),
      'chart_type_file'       => new sfWidgetFormInputText(),
      'created_at'            => new sfWidgetFormDateTime(),
      'updated_at'            => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                    => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'chart_type_category'   => new sfValidatorString(array('max_length' => 100)),
      'chart_type_name'       => new sfValidatorString(array('max_length' => 100)),
      'chart_type_text'       => new sfValidatorString(array('max_length' => 100)),
      'chart_type_short_name' => new sfValidatorString(array('max_length' => 100)),
      'chart_type_image'      => new sfValidatorString(array('max_length' => 100)),
      'chart_type_file'       => new sfValidatorString(array('max_length' => 100)),
      'created_at'            => new sfValidatorDateTime(array('required' => false)),
      'updated_at'            => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('btchart_type[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'BtchartType';
  }

}
