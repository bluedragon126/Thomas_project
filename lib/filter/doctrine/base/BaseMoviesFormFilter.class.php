<?php

/**
 * Movies filter form base class.
 *
 * @package    sisterbt
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseMoviesFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'movie_title'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'movie_link'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'movie_desc'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'movie_status'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'movie_display_count' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'movie_title'         => new sfValidatorPass(array('required' => false)),
      'movie_link'          => new sfValidatorPass(array('required' => false)),
      'movie_desc'          => new sfValidatorPass(array('required' => false)),
      'movie_status'        => new sfValidatorPass(array('required' => false)),
      'movie_display_count' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('movies_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Movies';
  }

  public function getFields()
  {
    return array(
      'id'                  => 'Number',
      'movie_title'         => 'Text',
      'movie_link'          => 'Text',
      'movie_desc'          => 'Text',
      'movie_status'        => 'Text',
      'movie_display_count' => 'Number',
    );
  }
}
