<?php

/**
 * SbtAnalysis form base class.
 *
 * @method SbtAnalysis getObject() Returns the current form's model object
 *
 * @package    sisterbt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseSbtAnalysisForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                     => new sfWidgetFormInputHidden(),
      'author_id'              => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => false)),
      'analysis_category_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SbtArticleCategory'), 'add_empty' => false)),
      'analysis_type_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SbtArticleType'), 'add_empty' => false)),
      'analysis_object_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SbtObject'), 'add_empty' => false)),
      'analysis_market_id'     => new sfWidgetFormInputText(),
      'analysis_stocklist_id'  => new sfWidgetFormInputText(),
      'analysis_sector_id'     => new sfWidgetFormInputText(),
      'analysis_title'         => new sfWidgetFormInputText(),
      'image'                  => new sfWidgetFormInputText(),
      'image_text'             => new sfWidgetFormTextarea(),
      'analysis_description'   => new sfWidgetFormTextarea(),
      'analysis_votes'         => new sfWidgetFormInputText(),
      'analysis_views'         => new sfWidgetFormInputText(),
      'analysis_medal_achived' => new sfWidgetFormInputText(),
      'published'              => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SbtAnalysisStatus'), 'add_empty' => false)),
      'created_at'             => new sfWidgetFormDateTime(),
      'updated_at'             => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                     => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'author_id'              => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'))),
      'analysis_category_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('SbtArticleCategory'))),
      'analysis_type_id'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('SbtArticleType'))),
      'analysis_object_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('SbtObject'))),
      'analysis_market_id'     => new sfValidatorInteger(array('required' => false)),
      'analysis_stocklist_id'  => new sfValidatorInteger(array('required' => false)),
      'analysis_sector_id'     => new sfValidatorInteger(array('required' => false)),
      'analysis_title'         => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'image'                  => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'image_text'             => new sfValidatorString(),
      'analysis_description'   => new sfValidatorString(),
      'analysis_votes'         => new sfValidatorInteger(array('required' => false)),
      'analysis_views'         => new sfValidatorInteger(array('required' => false)),
      'analysis_medal_achived' => new sfValidatorInteger(array('required' => false)),
      'published'              => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('SbtAnalysisStatus'), 'required' => false)),
      'created_at'             => new sfValidatorDateTime(array('required' => false)),
      'updated_at'             => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sbt_analysis[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SbtAnalysis';
  }

}
