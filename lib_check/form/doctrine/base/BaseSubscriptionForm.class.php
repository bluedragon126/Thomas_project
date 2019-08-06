<?php

/**
 * Subscription form base class.
 *
 * @method Subscription getObject() Returns the current form's model object
 *
 * @package    sisterbt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseSubscriptionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                         => new sfWidgetFormInputHidden(),
      'purchase_id'                => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Purchase'), 'add_empty' => true)),
      'product_id'                 => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('BtShopArticle'), 'add_empty' => true)),
      'product_type_id'            => new sfWidgetFormInputText(),
      'btchart_type_id'            => new sfWidgetFormInputText(),
      'articleornot'               => new sfWidgetFormInputText(),
      'subscription_duration'      => new sfWidgetFormInputText(),
      'subscription_duration_unit' => new sfWidgetFormInputText(),
      'scheme_name'                => new sfWidgetFormInputText(),
      'start_date'                 => new sfWidgetFormDate(),
      'end_date'                   => new sfWidgetFormDate(),
      'created_at'                 => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                         => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'purchase_id'                => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Purchase'), 'required' => false)),
      'product_id'                 => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('BtShopArticle'), 'required' => false)),
      'product_type_id'            => new sfValidatorInteger(array('required' => false)),
      'btchart_type_id'            => new sfValidatorInteger(array('required' => false)),
      'articleornot'               => new sfValidatorInteger(array('required' => false)),
      'subscription_duration'      => new sfValidatorInteger(array('required' => false)),
      'subscription_duration_unit' => new sfValidatorString(array('max_length' => 200)),
      'scheme_name'                => new sfValidatorString(array('max_length' => 200)),
      'start_date'                 => new sfValidatorDate(array('required' => false)),
      'end_date'                   => new sfValidatorDate(array('required' => false)),
      'created_at'                 => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('subscription[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Subscription';
  }

}
