<?php

/**
 * ContactUs form.
 *
 * @package    sisterbt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ContactUsForm extends BaseContactUsForm
{
  public function configure()
  {
      $this->setWidgets(array(
      'id'      => new sfWidgetFormInputHidden(),
      'code'    => new sfWidgetFormInputText(),
      'subject' => new sfWidgetFormInputText(),
      'content' => new sfWidgetFormTextarea(),
      'type'    => new sfWidgetFormChoice(array('choices'=>array('Abonnemang'=>'Abonnemang','Utbildningar'=>'Utbildningar','Metastock'=>'Metastock','Webinarium'=>'Webinarium','Forum'=>'Forum','Henrik Hallenborg'=>'Henrik Hallenborg','Thomas Sandström'=>'Thomas Sandström','Göran Högberg'=>'Göran Högberg','Övrigt'=>'Övrigt'))),
    ));

    $this->setValidators(array(
      'id'      => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'code'    => new sfValidatorString(array('max_length' => 100)),
      'subject' => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'content' => new sfValidatorString(array('required' => false)),
      'type'    => new sfValidatorString(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'ContactUs', 'column' => array('code')))
    );

    $this->widgetSchema->setNameFormat('contact_us[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);
  }
}
