<?php

/**
 * ArticleCategory filter form base class.
 *
 * @package    sisterbt
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseArticleCategoryFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'category_name' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'category_icon' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'category_name' => new sfValidatorPass(array('required' => false)),
      'category_icon' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('article_category_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ArticleCategory';
  }

  public function getFields()
  {
    return array(
      'category_id'   => 'Number',
      'category_name' => 'Text',
      'category_icon' => 'Text',
    );
  }
}
