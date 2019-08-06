<?php

/**
 * Coupon form.
 *
 * @package    sisterbt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CouponForm extends BaseCouponForm
{
  public function configure()
  {
    $statusArray = array(0 => "Active", 1 => "Inactive");
      
    $this->setWidgets(array(
      'id'   => new sfWidgetFormInputHidden(),
      'code' => new sfWidgetFormInputText(array(), array('maxlength'=>10)),
      'code_desc' => new sfWidgetFormInputText(array(), array('maxlength'=>10)),
      'status'     => new sfWidgetFormSelect(array('choices' => $statusArray)),  
    ));

    $this->setValidators(array(
      'id'   => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),     
      'code' => new sfValidatorNumber(array('required' => true, 'max' => 100, 'min' => 1), array('invalid' => 'Invalid Number', 'min' => 'Must be positive number', 'max' => 'Number should not be greated than 100')),
      'code_desc' => new sfValidatorString(array('required' => true)),   
      'status'     => new sfValidatorChoice(array('choices' => array_keys($statusArray), 'required' => true)),
      'created_at'      => new sfValidatorDateTime(array('required' => false)),
      'updated_at'      => new sfValidatorDateTime(array('required' => false)),
    ));
		
        unset($this['created_at']);

        if ($this->isNew()) {
            unset($this['updated_at']);
        } else {
            $this->setWidget('updated_at', new sfWidgetFormInputHidden());
        }
        
    $this->widgetSchema->setNameFormat('coupon[%s]');
    
    $this->widgetSchema->setLabels(array(
            'code' => 'Code',
            'code_desc' => 'Code Description',
            'status' => 'Status',
        ));
    

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);
    // add a post validator
    $this->validatorSchema->setPostValidator(
            new sfValidatorCallback(array('callback' => array($this, 'checkValidCouponData')))
    );
  }
  
    public function checkValidCouponData($validator, $values) {
        if (!empty($values['code_desc'])) {
            $course = Doctrine_Core::getTable('Coupon')->getUniqueCodeDesc($values);
            if ($course && $course[0]['id'] != $values['id']) {
                $error = new sfValidatorError($validator, 'Code already exist');

                // throw an error bound to the course offering id field
                throw new sfValidatorErrorSchema($validator, array('code_desc' => $error));
            }
        }
        return $values;
    }
}
