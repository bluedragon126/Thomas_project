<?php

/**
 * SbtAds filter form base class.
 *
 * @package    sisterbt
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseSbtAdsFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'ad_position'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'ad_name'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'ad_type'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'is_enabled'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'ccounter_id'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'priority'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'ad_title'            => new sfWidgetFormFilterInput(),
      'ad_target'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'display_count'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'total_display_count' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'is_archive'          => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'ad_position'         => new sfValidatorPass(array('required' => false)),
      'ad_name'             => new sfValidatorPass(array('required' => false)),
      'ad_type'             => new sfValidatorPass(array('required' => false)),
      'is_enabled'          => new sfValidatorPass(array('required' => false)),
      'ccounter_id'         => new sfValidatorPass(array('required' => false)),
      'priority'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'ad_title'            => new sfValidatorPass(array('required' => false)),
      'ad_target'           => new sfValidatorPass(array('required' => false)),
      'display_count'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'total_display_count' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'is_archive'          => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('sbt_ads_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SbtAds';
  }

  public function getFields()
  {
    return array(
      'id'                  => 'Number',
      'ad_position'         => 'Text',
      'ad_name'             => 'Text',
      'ad_type'             => 'Text',
      'is_enabled'          => 'Text',
      'ccounter_id'         => 'Text',
      'priority'            => 'Number',
      'ad_title'            => 'Text',
      'ad_target'           => 'Text',
      'display_count'       => 'Number',
      'total_display_count' => 'Number',
      'is_archive'          => 'Boolean',
    );
  }
}
