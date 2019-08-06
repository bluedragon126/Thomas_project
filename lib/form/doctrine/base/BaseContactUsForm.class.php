<?php

/**
 * ContactUs form base class.
 *
 * @method ContactUs getObject() Returns the current form's model object
 *
 * @package    sisterbt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseContactUsForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'      => new sfWidgetFormInputHidden(),
      'code'    => new sfWidgetFormInputText(),
      'subject' => new sfWidgetFormInputText(),
      'content' => new sfWidgetFormTextarea(),
      'type'    => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'      => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'code'    => new sfValidatorString(array('max_length' => 100)),
      'subject' => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'content' => new sfValidatorString(array('required' => false)),
      'type'    => new sfValidatorString(array('max_length' => 100, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'ContactUs', 'column' => array('code')))
    );

    $this->widgetSchema->setNameFormat('contact_us[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ContactUs';
  }

}
