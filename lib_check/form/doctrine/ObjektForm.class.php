<?php

/**
 * Objekt form.
 *
 * @package    sisterbt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ObjektForm extends BaseObjektForm
{
  public function configure()
  {
    $this->setWidgets(array(
      'object_id'      => new sfWidgetFormInputHidden(),
      'object_name'    => new sfWidgetFormInputText(),
      'object_date'    => new sfWidgetFormInputHidden(),
      'object_country' => new sfWidgetFormInputText(),
      'object_logo'    => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'object_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'object_id', 'required' => false)),
      'object_name'    => new sfValidatorString(array('max_length' => 20)),
      'object_date'    => new sfValidatorDate(array('required' => false)),
      'object_country' => new sfValidatorString(array('max_length' => 3)),
      'object_logo'    => new sfValidatorString(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('objekt[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);
  }
}
