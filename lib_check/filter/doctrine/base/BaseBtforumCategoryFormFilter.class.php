<?php

/**
 * BtforumCategory filter form base class.
 *
 * @package    sisterbt
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseBtforumCategoryFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'btforum_category_name'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'btforum_subcategory_id_list' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'btforum_category_name'       => new sfValidatorPass(array('required' => false)),
      'btforum_subcategory_id_list' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('btforum_category_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'BtforumCategory';
  }

  public function getFields()
  {
    return array(
      'id'                          => 'Number',
      'btforum_category_name'       => 'Text',
      'btforum_subcategory_id_list' => 'Text',
    );
  }
}
