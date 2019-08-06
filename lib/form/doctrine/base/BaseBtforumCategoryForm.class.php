<?php

/**
 * BtforumCategory form base class.
 *
 * @method BtforumCategory getObject() Returns the current form's model object
 *
 * @package    sisterbt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseBtforumCategoryForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                          => new sfWidgetFormInputHidden(),
      'btforum_category_name'       => new sfWidgetFormInputText(),
      'btforum_subcategory_id_list' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                          => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'btforum_category_name'       => new sfValidatorString(array('max_length' => 200)),
      'btforum_subcategory_id_list' => new sfValidatorString(array('max_length' => 200)),
    ));

    $this->widgetSchema->setNameFormat('btforum_category[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'BtforumCategory';
  }

}
