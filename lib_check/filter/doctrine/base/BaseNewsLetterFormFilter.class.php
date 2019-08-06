<?php

/**
 * NewsLetter filter form base class.
 *
 * @package    sisterbt
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseNewsLetterFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'        => new sfWidgetFormFilterInput(),
      'ads'         => new sfWidgetFormFilterInput(),
      'article'     => new sfWidgetFormFilterInput(),
      'sbt_article' => new sfWidgetFormFilterInput(),
      'blog'        => new sfWidgetFormFilterInput(),
      'publish'     => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'sent'        => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'name'        => new sfValidatorPass(array('required' => false)),
      'ads'         => new sfValidatorPass(array('required' => false)),
      'article'     => new sfValidatorPass(array('required' => false)),
      'sbt_article' => new sfValidatorPass(array('required' => false)),
      'blog'        => new sfValidatorPass(array('required' => false)),
      'publish'     => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'sent'        => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('news_letter_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'NewsLetter';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'name'        => 'Text',
      'ads'         => 'Text',
      'article'     => 'Text',
      'sbt_article' => 'Text',
      'blog'        => 'Text',
      'publish'     => 'Boolean',
      'sent'        => 'Boolean',
    );
  }
}
