<?php

/**
 * OrderCount form.
 *
 * @package    sisterbt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class OrderCountForm extends BaseOrderCountForm
{
  public function configure()
  {
       $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'action'      => new sfWidgetFormInputHidden(),
      //'order_count' => new sfWidgetFormChoice(array('choices'=>array('25'=>'25','50'=>'50','75'=>'75'))),
      'order_count' => new sfWidgetFormChoice(array('choices'=>array('75'=>'75','250'=>'250','500'=>'500','1000'=>'1000'))),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'action'      => new sfValidatorString(array('max_length' => 100)),
      'order_count' => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('order_count[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);
  }
}
