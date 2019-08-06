<?php

/**
 * SbtAnalysis filter form base class.
 *
 * @package    sisterbt
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseSbtAnalysisFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'author_id'              => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => true)),
      'analysis_category_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SbtArticleCategory'), 'add_empty' => true)),
      'analysis_type_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SbtArticleType'), 'add_empty' => true)),
      'analysis_object_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SbtObject'), 'add_empty' => true)),
      'analysis_market_id'     => new sfWidgetFormFilterInput(),
      'analysis_stocklist_id'  => new sfWidgetFormFilterInput(),
      'analysis_sector_id'     => new sfWidgetFormFilterInput(),
      'analysis_title'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'image'                  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'image_text'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'analysis_description'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'analysis_votes'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'analysis_views'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'analysis_medal_achived' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'published'              => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SbtAnalysisStatus'), 'add_empty' => true)),
      'created_at'             => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'             => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'author_id'              => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('sfGuardUser'), 'column' => 'id')),
      'analysis_category_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('SbtArticleCategory'), 'column' => 'id')),
      'analysis_type_id'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('SbtArticleType'), 'column' => 'id')),
      'analysis_object_id'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('SbtObject'), 'column' => 'id')),
      'analysis_market_id'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'analysis_stocklist_id'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'analysis_sector_id'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'analysis_title'         => new sfValidatorPass(array('required' => false)),
      'image'                  => new sfValidatorPass(array('required' => false)),
      'image_text'             => new sfValidatorPass(array('required' => false)),
      'analysis_description'   => new sfValidatorPass(array('required' => false)),
      'analysis_votes'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'analysis_views'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'analysis_medal_achived' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'published'              => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('SbtAnalysisStatus'), 'column' => 'id')),
      'created_at'             => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'             => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('sbt_analysis_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SbtAnalysis';
  }

  public function getFields()
  {
    return array(
      'id'                     => 'Number',
      'author_id'              => 'ForeignKey',
      'analysis_category_id'   => 'ForeignKey',
      'analysis_type_id'       => 'ForeignKey',
      'analysis_object_id'     => 'ForeignKey',
      'analysis_market_id'     => 'Number',
      'analysis_stocklist_id'  => 'Number',
      'analysis_sector_id'     => 'Number',
      'analysis_title'         => 'Text',
      'image'                  => 'Text',
      'image_text'             => 'Text',
      'analysis_description'   => 'Text',
      'analysis_votes'         => 'Number',
      'analysis_views'         => 'Number',
      'analysis_medal_achived' => 'Number',
      'published'              => 'ForeignKey',
      'created_at'             => 'Date',
      'updated_at'             => 'Date',
    );
  }
}
