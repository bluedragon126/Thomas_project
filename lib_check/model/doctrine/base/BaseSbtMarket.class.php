<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('SbtMarket', 'doctrine');

/**
 * BaseSbtMarket
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $sbt_market_name
 * @property Doctrine_Collection $SbtObject
 * @property Doctrine_Collection $SbtMarketStocklist
 * 
 * @method integer             getId()                 Returns the current record's "id" value
 * @method string              getSbtMarketName()      Returns the current record's "sbt_market_name" value
 * @method Doctrine_Collection getSbtObject()          Returns the current record's "SbtObject" collection
 * @method Doctrine_Collection getSbtMarketStocklist() Returns the current record's "SbtMarketStocklist" collection
 * @method SbtMarket           setId()                 Sets the current record's "id" value
 * @method SbtMarket           setSbtMarketName()      Sets the current record's "sbt_market_name" value
 * @method SbtMarket           setSbtObject()          Sets the current record's "SbtObject" collection
 * @method SbtMarket           setSbtMarketStocklist() Sets the current record's "SbtMarketStocklist" collection
 * 
 * @package    sisterbt
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseSbtMarket extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('sbt_market');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('sbt_market_name', 'string', 100, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 100,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('SbtObject', array(
             'local' => 'id',
             'foreign' => 'market_id'));

        $this->hasMany('SbtMarketStocklist', array(
             'local' => 'id',
             'foreign' => 'sbt_market_id'));
    }
}