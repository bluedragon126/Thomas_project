<?php

/**
 * SbtAds form base class.
 *
 * @method SbtAds getObject() Returns the current form's model object
 *
 * @package    sisterbt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseSbtAdsForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                  => new sfWidgetFormInputHidden(),
      'ad_position'         => new sfWidgetFormInputText(),
      'ad_name'             => new sfWidgetFormInputText(),
      'ad_type'             => new sfWidgetFormInputText(),
      'is_enabled'          => new sfWidgetFormInputText(),
      'ccounter_id'         => new sfWidgetFormInputText(),
      'priority'            => new sfWidgetFormInputText(),
      'ad_title'            => new sfWidgetFormTextarea(),
      'ad_target'           => new sfWidgetFormInputText(),
      'display_count'       => new sfWidgetFormInputText(),
      'total_display_count' => new sfWidgetFormInputText(),
      'is_archive'          => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'                  => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'ad_position'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'ad_name'             => new sfValidatorString(array('max_length' => 255)),
      'ad_type'             => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'is_enabled'          => new sfValidatorString(array('max_length' => 1, 'required' => false)),
      'ccounter_id'         => new sfValidatorString(array('max_length' => 5, 'required' => false)),
      'priority'            => new sfValidatorInteger(array('required' => false)),
      'ad_title'            => new sfValidatorString(array('required' => false)),
      'ad_target'           => new sfValidatorString(array('max_length' => 5, 'required' => false)),
      'display_count'       => new sfValidatorInteger(array('required' => false)),
      'total_display_count' => new sfValidatorInteger(array('required' => false)),
      'is_archive'          => new sfValidatorBoolean(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sbt_ads[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SbtAds';
  }

}
