<?php

/**
 * SbtUserBlogProfile form base class.
 *
 * @method SbtUserBlogProfile getObject() Returns the current form's model object
 *
 * @package    sisterbt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseSbtUserBlogProfileForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                         => new sfWidgetFormInputHidden(),
      'user_id'                    => new sfWidgetFormInputText(),
      'blog_header_name'           => new sfWidgetFormInputText(),
      'blog_header_name_color'     => new sfWidgetFormInputText(),
      'blog_header_info'           => new sfWidgetFormTextarea(),
      'blog_header_info_color'     => new sfWidgetFormInputText(),
      'blog_header_image'          => new sfWidgetFormInputText(),
      'blog_page_background_color' => new sfWidgetFormInputText(),
      'blog_profile_img_text'      => new sfWidgetFormInputText(),
      'blog_profile_comment'       => new sfWidgetFormInputText(),
      'created_at'                 => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                         => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'user_id'                    => new sfValidatorInteger(array('required' => false)),
      'blog_header_name'           => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'blog_header_name_color'     => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'blog_header_info'           => new sfValidatorString(array('max_length' => 1000, 'required' => false)),
      'blog_header_info_color'     => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'blog_header_image'          => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'blog_page_background_color' => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'blog_profile_img_text'      => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'blog_profile_comment'       => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'created_at'                 => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sbt_user_blog_profile[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SbtUserBlogProfile';
  }

}
