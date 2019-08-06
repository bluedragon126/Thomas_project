<?php

/**
 * ContactEnquiryPost filter form base class.
 *
 * @package    sisterbt
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseContactEnquiryPostFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'title'         => new sfWidgetFormFilterInput(),
      'reply_text'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'enq_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ContactEnquiry'), 'add_empty' => true)),
      'author_name'   => new sfWidgetFormFilterInput(),
      'post_id'       => new sfWidgetFormFilterInput(),
      'reply_date'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'admin_or_user' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'title'         => new sfValidatorPass(array('required' => false)),
      'reply_text'    => new sfValidatorPass(array('required' => false)),
      'enq_id'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('ContactEnquiry'), 'column' => 'id')),
      'author_name'   => new sfValidatorPass(array('required' => false)),
      'post_id'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'reply_date'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'admin_or_user' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('contact_enquiry_post_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ContactEnquiryPost';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'title'         => 'Text',
      'reply_text'    => 'Text',
      'enq_id'        => 'ForeignKey',
      'author_name'   => 'Text',
      'post_id'       => 'Number',
      'reply_date'    => 'Date',
      'admin_or_user' => 'Number',
    );
  }
}
