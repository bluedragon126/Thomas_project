<?php

/**
 * UserStatus filter form base class.
 *
 * @package    sisterbt
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseUserStatusFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'userstat'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'userstat'   => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('user_status_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'UserStatus';
  }

  public function getFields()
  {
    return array(
      'userstatid' => 'Number',
      'userstat'   => 'Text',
    );
  }
}
