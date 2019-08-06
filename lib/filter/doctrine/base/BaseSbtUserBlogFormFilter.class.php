<?php

/**
 * SbtUserBlog filter form base class.
 *
 * @package    sisterbt
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseSbtUserBlogFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'author_id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => true)),
      'ublog_category_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SbtArticleCategory'), 'add_empty' => true)),
      'ublog_type_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SbtArticleType'), 'add_empty' => true)),
      'ublog_object_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SbtObject'), 'add_empty' => true)),
      'ublog_market_id'    => new sfWidgetFormFilterInput(),
      'ublog_stocklist_id' => new sfWidgetFormFilterInput(),
      'ublog_sector_id'    => new sfWidgetFormFilterInput(),
      'ublog_title'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'ublog_description'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'ublog_views'        => new sfWidgetFormFilterInput(),
      'ublog_votes'        => new sfWidgetFormFilterInput(),
      'updated_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'created_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'author_id'          => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('sfGuardUser'), 'column' => 'id')),
      'ublog_category_id'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('SbtArticleCategory'), 'column' => 'id')),
      'ublog_type_id'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('SbtArticleType'), 'column' => 'id')),
      'ublog_object_id'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('SbtObject'), 'column' => 'id')),
      'ublog_market_id'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'ublog_stocklist_id' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'ublog_sector_id'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'ublog_title'        => new sfValidatorPass(array('required' => false)),
      'ublog_description'  => new sfValidatorPass(array('required' => false)),
      'ublog_views'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'ublog_votes'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'updated_at'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'created_at'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('sbt_user_blog_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SbtUserBlog';
  }

  public function getFields()
  {
    return array(
      'id'                 => 'Number',
      'author_id'          => 'ForeignKey',
      'ublog_category_id'  => 'ForeignKey',
      'ublog_type_id'      => 'ForeignKey',
      'ublog_object_id'    => 'ForeignKey',
      'ublog_market_id'    => 'Number',
      'ublog_stocklist_id' => 'Number',
      'ublog_sector_id'    => 'Number',
      'ublog_title'        => 'Text',
      'ublog_description'  => 'Text',
      'ublog_views'        => 'Number',
      'ublog_votes'        => 'Number',
      'updated_at'         => 'Date',
      'created_at'         => 'Date',
    );
  }
}
