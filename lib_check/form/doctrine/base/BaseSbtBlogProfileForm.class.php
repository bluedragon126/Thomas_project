<?php

/**
 * SbtBlogProfile form base class.
 *
 * @method SbtBlogProfile getObject() Returns the current form's model object
 *
 * @package    sisterbt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseSbtBlogProfileForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                           => new sfWidgetFormInputHidden(),
      'user_id'                      => new sfWidgetFormInputText(),
      'my_own_writing'               => new sfWidgetFormTextarea(),
      'user_title'                   => new sfWidgetFormInputText(),
      'not_on_stock'                 => new sfWidgetFormInputText(),
      'type_of_speculator'           => new sfWidgetFormInputText(),
      'broker_used'                  => new sfWidgetFormInputText(),
      'my_trade'                     => new sfWidgetFormInputText(),
      'my_occupation'                => new sfWidgetFormInputText(),
      'is_millionaire'               => new sfWidgetFormInputText(),
      'my_best_trade'                => new sfWidgetFormInputText(),
      'my_worst_trade'               => new sfWidgetFormInputText(),
      'my_five_best_recommendations' => new sfWidgetFormInputText(),
      'my_shortlist'                 => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                           => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'user_id'                      => new sfValidatorInteger(),
      'my_own_writing'               => new sfValidatorString(),
      'user_title'                   => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'not_on_stock'                 => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'type_of_speculator'           => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'broker_used'                  => new sfValidatorString(array('max_length' => 200)),
      'my_trade'                     => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'my_occupation'                => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'is_millionaire'               => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'my_best_trade'                => new sfValidatorString(array('max_length' => 200)),
      'my_worst_trade'               => new sfValidatorString(array('max_length' => 200)),
      'my_five_best_recommendations' => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'my_shortlist'                 => new sfValidatorString(array('max_length' => 200, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sbt_blog_profile[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SbtBlogProfile';
  }

}
