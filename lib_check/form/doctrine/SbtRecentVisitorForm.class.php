<?php

/**
 * SbtRecentVisitor form.
 *
 * @package    sisterbt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class SbtRecentVisitorForm extends BaseSbtRecentVisitorForm
{
  public function configure()
  {
    $this->setWidgets(array(
     // 'id'                 => new sfWidgetFormInputHidden(),
      'profile_user_id'    => new sfWidgetFormInputHidden(),
      'profile_visitor_id' => new sfWidgetFormInputHidden(),
      'created_at'         => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'id'                 => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'profile_user_id'    => new sfValidatorInteger(array('required' => false)),
      'profile_visitor_id' => new sfValidatorInteger(array('required' => false)),
      'created_at'         => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sbt_recent_visitor[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);
  }
}
