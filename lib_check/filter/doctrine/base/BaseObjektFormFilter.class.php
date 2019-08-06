<?php

/**
 * Objekt filter form base class.
 *
 * @package    sisterbt
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseObjektFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'object_name'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'object_date'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'object_country' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'object_logo'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'object_name'    => new sfValidatorPass(array('required' => false)),
      'object_date'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'object_country' => new sfValidatorPass(array('required' => false)),
      'object_logo'    => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('objekt_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Objekt';
  }

  public function getFields()
  {
    return array(
      'object_id'      => 'Number',
      'object_name'    => 'Text',
      'object_date'    => 'Date',
      'object_country' => 'Text',
      'object_logo'    => 'Text',
    );
  }
}
