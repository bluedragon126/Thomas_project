<?php

/**
 * Btforum filter form base class.
 *
 * @package    sisterbt
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseBtforumFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'author_id'              => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => true)),
      'skapare'                => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'rubrik'                 => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'textarea'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'datum'                  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'andratdatum'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'visningar'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'ant_inlagg'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'amne'                   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'koppling'               => new sfWidgetFormFilterInput(),
      'btforum_category_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('BtforumCategory'), 'add_empty' => true)),
      'btforum_subcategory_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('BtforumSubcategory'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'author_id'              => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('sfGuardUser'), 'column' => 'id')),
      'skapare'                => new sfValidatorPass(array('required' => false)),
      'rubrik'                 => new sfValidatorPass(array('required' => false)),
      'textarea'               => new sfValidatorPass(array('required' => false)),
      'datum'                  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'andratdatum'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'visningar'              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'ant_inlagg'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'amne'                   => new sfValidatorPass(array('required' => false)),
      'koppling'               => new sfValidatorPass(array('required' => false)),
      'btforum_category_id'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('BtforumCategory'), 'column' => 'id')),
      'btforum_subcategory_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('BtforumSubcategory'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('btforum_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Btforum';
  }

  public function getFields()
  {
    return array(
      'id'                     => 'Number',
      'author_id'              => 'ForeignKey',
      'skapare'                => 'Text',
      'rubrik'                 => 'Text',
      'textarea'               => 'Text',
      'datum'                  => 'Date',
      'andratdatum'            => 'Date',
      'visningar'              => 'Number',
      'ant_inlagg'             => 'Number',
      'amne'                   => 'Text',
      'koppling'               => 'Text',
      'btforum_category_id'    => 'ForeignKey',
      'btforum_subcategory_id' => 'ForeignKey',
    );
  }
}
