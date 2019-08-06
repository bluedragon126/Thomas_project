<?php

/**
 * SbtRecentVisitor form base class.
 *
 * @method SbtRecentVisitor getObject() Returns the current form's model object
 *
 * @package    sisterbt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseSbtRecentVisitorForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                 => new sfWidgetFormInputHidden(),
      'profile_user_id'    => new sfWidgetFormInputText(),
      'profile_visitor_id' => new sfWidgetFormInputText(),
      'created_at'         => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                 => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'profile_user_id'    => new sfValidatorInteger(array('required' => false)),
      'profile_visitor_id' => new sfValidatorInteger(array('required' => false)),
      'created_at'         => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sbt_recent_visitor[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SbtRecentVisitor';
  }

}
