<?php

/**
 * BtShopArticleType filter form base class.
 *
 * @package    sisterbt
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseBtShopArticleTypeFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'btshop_type_name' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'login_required'   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'btshop_type_name' => new sfValidatorPass(array('required' => false)),
      'login_required'   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('bt_shop_article_type_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'BtShopArticleType';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'btshop_type_name' => 'Text',
      'login_required'   => 'Boolean',
    );
  }
}
