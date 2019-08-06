<?php

/**
 * SbtBlogVoteDetails form base class.
 *
 * @method SbtBlogVoteDetails getObject() Returns the current form's model object
 *
 * @package    sisterbt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseSbtBlogVoteDetailsForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'blog_id'      => new sfWidgetFormInputText(),
      'user_id'      => new sfWidgetFormInputText(),
      'vote_type_id' => new sfWidgetFormInputText(),
      'created_at'   => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'blog_id'      => new sfValidatorInteger(),
      'user_id'      => new sfValidatorInteger(),
      'vote_type_id' => new sfValidatorInteger(),
      'created_at'   => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('sbt_blog_vote_details[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SbtBlogVoteDetails';
  }

}
