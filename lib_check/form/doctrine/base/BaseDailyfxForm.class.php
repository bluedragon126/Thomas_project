<?php

/**
 * Dailyfx form base class.
 *
 * @method Dailyfx getObject() Returns the current form's model object
 *
 * @package    sisterbt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseDailyfxForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'ad_date'        => new sfWidgetFormInputText(),
      'ad_time'        => new sfWidgetFormInputText(),
      'ad_currency'    => new sfWidgetFormInputText(),
      'ad_description' => new sfWidgetFormInputText(),
      'ad_importance'  => new sfWidgetFormInputText(),
      'ad_actual'      => new sfWidgetFormInputText(),
      'ad_forecast'    => new sfWidgetFormInputText(),
      'ad_previous'    => new sfWidgetFormInputText(),
      'ad_tmstamp'     => new sfWidgetFormDateTime(),
      'ad_tmzone'      => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'ad_date'        => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'ad_time'        => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'ad_currency'    => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'ad_description' => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'ad_importance'  => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'ad_actual'      => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'ad_forecast'    => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'ad_previous'    => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'ad_tmstamp'     => new sfValidatorDateTime(),
      'ad_tmzone'      => new sfValidatorString(array('max_length' => 128, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('dailyfx[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Dailyfx';
  }

}
