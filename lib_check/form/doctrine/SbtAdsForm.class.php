<?php

/**
 * SbtAds form.
 *
 * @package    sisterbt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class SbtAdsForm extends BaseSbtAdsForm
{
  public function configure()
  {
  	$this->widgetSchema['ad_position'] = new sfWidgetFormSelect(array('choices' => array()));
	$this->widgetSchema['ad_type'] = new sfWidgetFormSelect(array('choices' => array()));
	$this->widgetSchema['ad_name'] = new sfWidgetFormInputText();
	$this->widgetSchema['ad_title'] = new sfWidgetFormInputText();
	$this->widgetSchema['priority'] = new sfWidgetFormInputText();
	
	
	$this->validatorSchema['ad_position'] = new sfValidatorString();
	$this->validatorSchema['ad_type'] = new sfValidatorString();
	$this->validatorSchema['ad_name'] = new sfValidatorString(array('required' => false));
	$this->validatorSchema['ad_title'] = new sfValidatorString(array('required' => false));
	$this->validatorSchema['priority'] = new sfValidatorNumber(array('required' => true,'min'=>1,'max'=>100));
	
	$this->widgetSchema->setNameFormat('bt_shop_article[%s]');
    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);
  }
}
