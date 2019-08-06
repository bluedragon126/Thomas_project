<?php

/**
 * SbtVoteDetails form base class.
 *
 * @method SbtVoteDetails getObject() Returns the current form's model object
 *
 * @package    sisterbt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseSbtVoteDetailsForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'author_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => false)),
      'type_id'      => new sfWidgetFormInputText(),
      'art_blog_id'  => new sfWidgetFormInputText(),
      'user_id'      => new sfWidgetFormInputText(),
      'vote_type_id' => new sfWidgetFormInputText(),
      'created_at'   => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'author_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'))),
      'type_id'      => new sfValidatorInteger(),
      'art_blog_id'  => new sfValidatorInteger(),
      'user_id'      => new sfValidatorInteger(),
      'vote_type_id' => new sfValidatorInteger(),
      'created_at'   => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('sbt_vote_details[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SbtVoteDetails';
  }

}
