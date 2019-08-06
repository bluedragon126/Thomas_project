<?php

/**
 * BtShopArticleType form base class.
 *
 * @method BtShopArticleType getObject() Returns the current form's model object
 *
 * @package    sisterbt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseBtShopArticleTypeForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'btshop_type_name' => new sfWidgetFormInputText(),
      'login_required'   => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'btshop_type_name' => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'login_required'   => new sfValidatorBoolean(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('bt_shop_article_type[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'BtShopArticleType';
  }

}
