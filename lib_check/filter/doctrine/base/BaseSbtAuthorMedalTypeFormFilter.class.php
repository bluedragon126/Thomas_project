<?php

/**
 * SbtAuthorMedalType filter form base class.
 *
 * @package    sisterbt
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseSbtAuthorMedalTypeFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'author_medal_name' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'author_medal_name' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sbt_author_medal_type_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SbtAuthorMedalType';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'author_medal_name' => 'Text',
    );
  }
}
