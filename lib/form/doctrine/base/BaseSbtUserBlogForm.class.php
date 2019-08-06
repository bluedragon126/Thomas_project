<?php

/**
 * SbtUserBlog form base class.
 *
 * @method SbtUserBlog getObject() Returns the current form's model object
 *
 * @package    sisterbt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseSbtUserBlogForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                 => new sfWidgetFormInputHidden(),
      'author_id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => false)),
      'ublog_category_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SbtArticleCategory'), 'add_empty' => false)),
      'ublog_type_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SbtArticleType'), 'add_empty' => false)),
      'ublog_object_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SbtObject'), 'add_empty' => true)),
      'ublog_market_id'    => new sfWidgetFormInputText(),
      'ublog_stocklist_id' => new sfWidgetFormInputText(),
      'ublog_sector_id'    => new sfWidgetFormInputText(),
      'ublog_title'        => new sfWidgetFormInputText(),
      'ublog_description'  => new sfWidgetFormTextarea(),
      'ublog_views'        => new sfWidgetFormInputText(),
      'ublog_votes'        => new sfWidgetFormInputText(),
      'updated_at'         => new sfWidgetFormDateTime(),
      'created_at'         => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                 => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'author_id'          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'))),
      'ublog_category_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('SbtArticleCategory'))),
      'ublog_type_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('SbtArticleType'))),
      'ublog_object_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('SbtObject'), 'required' => false)),
      'ublog_market_id'    => new sfValidatorInteger(array('required' => false)),
      'ublog_stocklist_id' => new sfValidatorInteger(array('required' => false)),
      'ublog_sector_id'    => new sfValidatorInteger(array('required' => false)),
      'ublog_title'        => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'ublog_description'  => new sfValidatorString(),
      'ublog_views'        => new sfValidatorInteger(array('required' => false)),
      'ublog_votes'        => new sfValidatorInteger(array('required' => false)),
      'updated_at'         => new sfValidatorDateTime(array('required' => false)),
      'created_at'         => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sbt_user_blog[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SbtUserBlog';
  }

}
