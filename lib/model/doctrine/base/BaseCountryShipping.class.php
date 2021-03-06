<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('CountryShipping', 'doctrine');

/**
 * BaseCountryShipping
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $country_region_id
 * @property integer $item_weight
 * @property integer $price
 * 
 * @method integer         getId()                Returns the current record's "id" value
 * @method integer         getCountryRegionId()   Returns the current record's "country_region_id" value
 * @method integer         getItemWeight()        Returns the current record's "item_weight" value
 * @method integer         getPrice()             Returns the current record's "price" value
 * @method CountryShipping setId()                Sets the current record's "id" value
 * @method CountryShipping setCountryRegionId()   Sets the current record's "country_region_id" value
 * @method CountryShipping setItemWeight()        Sets the current record's "item_weight" value
 * @method CountryShipping setPrice()             Sets the current record's "price" value
 * 
 * @package    sisterbt
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseCountryShipping extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('country_shipping');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('country_region_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('item_weight', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('price', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}