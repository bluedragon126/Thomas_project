<?php

/**
 * Movies form base class.
 *
 * @method Movies getObject() Returns the current form's model object
 *
 * @package    sisterbt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseMoviesForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                  => new sfWidgetFormInputHidden(),
      'movie_title'         => new sfWidgetFormTextarea(),
      'movie_link'          => new sfWidgetFormTextarea(),
      'movie_desc'          => new sfWidgetFormTextarea(),
      'movie_status'        => new sfWidgetFormInputText(),
      'movie_display_count' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                  => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'movie_title'         => new sfValidatorString(array('max_length' => 512)),
      'movie_link'          => new sfValidatorString(array('max_length' => 512)),
      'movie_desc'          => new sfValidatorString(),
      'movie_status'        => new sfValidatorString(array('max_length' => 20)),
      'movie_display_count' => new sfValidatorInteger(),
    ));

    $this->widgetSchema->setNameFormat('movies[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Movies';
  }

}
