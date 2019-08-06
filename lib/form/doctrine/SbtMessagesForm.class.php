<?php

/**
 * SbtMessages form.
 *
 * @package    sisterbt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class SbtMessagesForm extends BaseSbtMessagesForm
{
  public function configure()
  {
  	$this->setWidgets(array(
      //'id'             => new sfWidgetFormInputHidden(),
      'message_to'     => new sfWidgetFormInputHidden(),
      'message_from'   => new sfWidgetFormInputHidden(),
      'message_detail' => new sfWidgetFormTextarea(),
      'created_at'     => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'message_to'     => new sfValidatorInteger(array('required' => false)),
      'message_from'   => new sfValidatorInteger(array('required' => false)),
      'message_detail' => new sfValidatorString(array('required' => false)),
      'created_at'     => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sbt_messages[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);
  }
}
