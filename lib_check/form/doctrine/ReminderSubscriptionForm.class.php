<?php

/**
 * ReminderSubscription form.
 *
 * @package    sisterbt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ReminderSubscriptionForm extends BaseReminderSubscriptionForm
{
  public function configure()
  {

          
      $this->product = new BtShopArticle();     
      
      $this->subscription_types = $this->product->getAllShopArticleTitle();
        
      //$this->widgetSchema['subscription_type'] = new sfWidgetFormSelect(array('choices' => $this->subscription_types ));
      $this->widgetSchema['subscription_type'] = new sfWidgetFormChoice(array('choices' => array(''=>'Select Subscription Type')+$this->subscription_types));
      
    $this->setValidators(array(
      'id'                => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'subscription_type' => new sfValidatorInteger(array('required' => true)),
      'nof_days'          => new sfValidatorInteger(array('required' => true)),
      'subject'           => new sfValidatorString(array('max_length' => 200,'required' => true)),
      'email_contain'     => new sfValidatorString(array('max_length' => 500, 'required' => true)),
      'created_at'        => new sfValidatorDateTime(array('required' => false)),
    ));
     unset($this['created_at'], $this['updated_at']);
     
      $this->widgetSchema->setNameFormat('reminder_subscription[%s]');
      
      
  }
}
