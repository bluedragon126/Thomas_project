<?php

/**
 * SbtUserBlogProfile filter form base class.
 *
 * @package    sisterbt
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseSbtUserBlogProfileFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'user_id'                    => new sfWidgetFormFilterInput(),
      'blog_header_name'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'blog_header_name_color'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'blog_header_info'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'blog_header_info_color'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'blog_header_image'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'blog_page_background_color' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'blog_profile_img_text'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'blog_profile_comment'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'                 => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'user_id'                    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'blog_header_name'           => new sfValidatorPass(array('required' => false)),
      'blog_header_name_color'     => new sfValidatorPass(array('required' => false)),
      'blog_header_info'           => new sfValidatorPass(array('required' => false)),
      'blog_header_info_color'     => new sfValidatorPass(array('required' => false)),
      'blog_header_image'          => new sfValidatorPass(array('required' => false)),
      'blog_page_background_color' => new sfValidatorPass(array('required' => false)),
      'blog_profile_img_text'      => new sfValidatorPass(array('required' => false)),
      'blog_profile_comment'       => new sfValidatorPass(array('required' => false)),
      'created_at'                 => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('sbt_user_blog_profile_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SbtUserBlogProfile';
  }

  public function getFields()
  {
    return array(
      'id'                         => 'Number',
      'user_id'                    => 'Number',
      'blog_header_name'           => 'Text',
      'blog_header_name_color'     => 'Text',
      'blog_header_info'           => 'Text',
      'blog_header_info_color'     => 'Text',
      'blog_header_image'          => 'Text',
      'blog_page_background_color' => 'Text',
      'blog_profile_img_text'      => 'Text',
      'blog_profile_comment'       => 'Text',
      'created_at'                 => 'Date',
    );
  }
}
