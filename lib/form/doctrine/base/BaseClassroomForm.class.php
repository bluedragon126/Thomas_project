<?php

/**
 * Classroom form base class.
 *
 * @method Classroom getObject() Returns the current form's model object
 *
 * @package    sisterbt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseClassroomForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'creator'     => new sfWidgetFormInputText(),
      'title'       => new sfWidgetFormInputText(),
      'textarea'    => new sfWidgetFormTextarea(),
      'post_date'   => new sfWidgetFormInputText(),
      'other_dates' => new sfWidgetFormInputText(),
      'views'       => new sfWidgetFormInputText(),
      'reply_post'  => new sfWidgetFormInputText(),
      'topic'       => new sfWidgetFormInputText(),
      'parent_id'   => new sfWidgetFormInputText(),
      'group_id'    => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'creator'     => new sfValidatorString(array('max_length' => 50)),
      'title'       => new sfValidatorString(array('max_length' => 50)),
      'textarea'    => new sfValidatorString(),
      'post_date'   => new sfValidatorString(array('max_length' => 50)),
      'other_dates' => new sfValidatorString(array('max_length' => 50)),
      'views'       => new sfValidatorInteger(),
      'reply_post'  => new sfValidatorInteger(),
      'topic'       => new sfValidatorString(array('max_length' => 5)),
      'parent_id'   => new sfValidatorString(array('max_length' => 5)),
      'group_id'    => new sfValidatorString(array('max_length' => 50)),
    ));

    $this->widgetSchema->setNameFormat('classroom[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Classroom';
  }

}
