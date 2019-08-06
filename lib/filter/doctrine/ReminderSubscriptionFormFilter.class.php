<?php

/**
 * ReminderSubscription filter form.
 *
 * @package    sisterbt
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ReminderSubscriptionFormFilter extends BaseReminderSubscriptionFormFilter
{
  public function configure()
  {
      $this->product = new BtShopArticle();     
      
      $this->subscription_types = $this->product->getAllShopArticleTitleActive();
      $subType = $this->subscription_types;
      $subType = array(0 => "Select Subscription Type" ) + $subType;
      //var_dump($subType);die();
      //var_dump($subType);die();
        //$categoria_excelencia_values = array(null => 'Selecciona medalla', 'Oro' => 'Oro', 'Plata' => 'Plata', 'Bronce' => 'Bronce', 'ninguno' => 'Sin medalla');
        //$this->widgetSchema['subscription_type'] = new sfWidgetFormChoice(array('choices' => $subType));
        //$this->validatorSchema['subscription_type'] = new sfValidatorChoice(array('required' => false, 'choices' => array_keys($subType)));
        $this->widgetSchema['marca'] = new sfWidgetFormChoice(array('choices' => $subType));
        //'ad_color_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Ad_ColorT'), 'add_empty' => true)),
        $this->validatorSchema['marca']  = new sfValidatorPass(array('required' => false));
  }
  public function getFields()
    {
        $fields = parent::getFields();

        
        $fields['marca'] = 'marca';
        
        return $fields;
    }
    
    public function addMarcaColumnQuery($query, $field, $value)
    {
        //echo $query; die;
        //var_dump($value);die;
        if($value){
            //$rootAlias = $query->getRootAlias();

            
            $query->andWhere("r.subscription_type = '$value'");

            return $query;
        }
    }
}
