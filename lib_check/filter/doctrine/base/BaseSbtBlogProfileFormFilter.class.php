<?php

/**
 * SbtBlogProfile filter form base class.
 *
 * @package    sisterbt
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseSbtBlogProfileFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'user_id'                      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'my_own_writing'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'user_title'                   => new sfWidgetFormFilterInput(),
      'not_on_stock'                 => new sfWidgetFormFilterInput(),
      'type_of_speculator'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'broker_used'                  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'my_trade'                     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'my_occupation'                => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'is_millionaire'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'my_best_trade'                => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'my_worst_trade'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'my_five_best_recommendations' => new sfWidgetFormFilterInput(),
      'my_shortlist'                 => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'user_id'                      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'my_own_writing'               => new sfValidatorPass(array('required' => false)),
      'user_title'                   => new sfValidatorPass(array('required' => false)),
      'not_on_stock'                 => new sfValidatorPass(array('required' => false)),
      'type_of_speculator'           => new sfValidatorPass(array('required' => false)),
      'broker_used'                  => new sfValidatorPass(array('required' => false)),
      'my_trade'                     => new sfValidatorPass(array('required' => false)),
      'my_occupation'                => new sfValidatorPass(array('required' => false)),
      'is_millionaire'               => new sfValidatorPass(array('required' => false)),
      'my_best_trade'                => new sfValidatorPass(array('required' => false)),
      'my_worst_trade'               => new sfValidatorPass(array('required' => false)),
      'my_five_best_recommendations' => new sfValidatorPass(array('required' => false)),
      'my_shortlist'                 => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sbt_blog_profile_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SbtBlogProfile';
  }

  public function getFields()
  {
    return array(
      'id'                           => 'Number',
      'user_id'                      => 'Number',
      'my_own_writing'               => 'Text',
      'user_title'                   => 'Text',
      'not_on_stock'                 => 'Text',
      'type_of_speculator'           => 'Text',
      'broker_used'                  => 'Text',
      'my_trade'                     => 'Text',
      'my_occupation'                => 'Text',
      'is_millionaire'               => 'Text',
      'my_best_trade'                => 'Text',
      'my_worst_trade'               => 'Text',
      'my_five_best_recommendations' => 'Text',
      'my_shortlist'                 => 'Text',
    );
  }
}
