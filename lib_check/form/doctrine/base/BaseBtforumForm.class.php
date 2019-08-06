<?php

/**
 * Btforum form base class.
 *
 * @method Btforum getObject() Returns the current form's model object
 *
 * @package    sisterbt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseBtforumForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                     => new sfWidgetFormInputHidden(),
      'author_id'              => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => false)),
      'skapare'                => new sfWidgetFormInputText(),
      'rubrik'                 => new sfWidgetFormInputText(),
      'textarea'               => new sfWidgetFormTextarea(),
      'datum'                  => new sfWidgetFormDateTime(),
      'andratdatum'            => new sfWidgetFormDateTime(),
      'visningar'              => new sfWidgetFormInputText(),
      'ant_inlagg'             => new sfWidgetFormInputText(),
      'amne'                   => new sfWidgetFormInputText(),
      'koppling'               => new sfWidgetFormInputText(),
      'btforum_category_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('BtforumCategory'), 'add_empty' => false)),
      'btforum_subcategory_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('BtforumSubcategory'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'                     => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'author_id'              => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'))),
      'skapare'                => new sfValidatorString(array('max_length' => 50)),
      'rubrik'                 => new sfValidatorString(array('max_length' => 50)),
      'textarea'               => new sfValidatorString(),
      'datum'                  => new sfValidatorDateTime(),
      'andratdatum'            => new sfValidatorDateTime(),
      'visningar'              => new sfValidatorInteger(),
      'ant_inlagg'             => new sfValidatorInteger(),
      'amne'                   => new sfValidatorString(array('max_length' => 5)),
      'koppling'               => new sfValidatorString(array('max_length' => 5, 'required' => false)),
      'btforum_category_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('BtforumCategory'))),
      'btforum_subcategory_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('BtforumSubcategory'))),
    ));

    $this->widgetSchema->setNameFormat('btforum[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Btforum';
  }

}
