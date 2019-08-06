<?php

/**
 * BtforumSubcategory filter form base class.
 *
 * @package    sisterbt
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseBtforumSubcategoryFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'btforum_subcategory_name' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'btforum_subcategory_name' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('btforum_subcategory_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'BtforumSubcategory';
  }

  public function getFields()
  {
    return array(
      'id'                       => 'Number',
      'btforum_subcategory_name' => 'Text',
    );
  }
}
