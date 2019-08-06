<?php

/**
 * Authors filter form base class.
 *
 * @package    sisterbt
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseAuthorsFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'user_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => true)),
      'name'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'code'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'user_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('sfGuardUser'), 'column' => 'id')),
      'name'    => new sfValidatorPass(array('required' => false)),
      'code'    => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('authors_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Authors';
  }

  public function getFields()
  {
    return array(
      'id'      => 'Number',
      'user_id' => 'ForeignKey',
      'name'    => 'Text',
      'code'    => 'Text',
    );
  }
}
