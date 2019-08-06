<?php

/**
 * ArticleTemplate filter form base class.
 *
 * @package    sisterbt
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseArticleTemplateFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'template_name' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'author_id'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'article_date'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'category_id'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'type_id'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'object_id'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'title'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'listheader'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'image'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'image_text'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'text'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'author'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'art_statid'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'template_name' => new sfValidatorPass(array('required' => false)),
      'author_id'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'article_date'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'category_id'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'type_id'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'object_id'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'title'         => new sfValidatorPass(array('required' => false)),
      'listheader'    => new sfValidatorPass(array('required' => false)),
      'image'         => new sfValidatorPass(array('required' => false)),
      'image_text'    => new sfValidatorPass(array('required' => false)),
      'text'          => new sfValidatorPass(array('required' => false)),
      'author'        => new sfValidatorPass(array('required' => false)),
      'art_statid'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('article_template_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ArticleTemplate';
  }

  public function getFields()
  {
    return array(
      'template_id'   => 'Number',
      'template_name' => 'Text',
      'author_id'     => 'Number',
      'article_date'  => 'Date',
      'category_id'   => 'Number',
      'type_id'       => 'Number',
      'object_id'     => 'Number',
      'title'         => 'Text',
      'listheader'    => 'Text',
      'image'         => 'Text',
      'image_text'    => 'Text',
      'text'          => 'Text',
      'author'        => 'Text',
      'art_statid'    => 'Number',
    );
  }
}
