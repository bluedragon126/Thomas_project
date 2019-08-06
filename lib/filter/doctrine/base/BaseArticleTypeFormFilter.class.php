<?php

/**
 * ArticleType filter form base class.
 *
 * @package    sisterbt
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseArticleTypeFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'type_name' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'type_name' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('article_type_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ArticleType';
  }

  public function getFields()
  {
    return array(
      'type_id'   => 'Number',
      'type_name' => 'Text',
    );
  }
}
