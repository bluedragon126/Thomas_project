<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('BtchartCompanyCategory', 'doctrine');

/**
 * BaseBtchartCompanyCategory
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $company_type
 * @property timestamp $created_at
 * @property timestamp $updated_at
 * @property Doctrine_Collection $BtchartCompanyDetails
 * 
 * @method integer                getId()                    Returns the current record's "id" value
 * @method string                 getCompanyType()           Returns the current record's "company_type" value
 * @method timestamp              getCreatedAt()             Returns the current record's "created_at" value
 * @method timestamp              getUpdatedAt()             Returns the current record's "updated_at" value
 * @method Doctrine_Collection    getBtchartCompanyDetails() Returns the current record's "BtchartCompanyDetails" collection
 * @method BtchartCompanyCategory setId()                    Sets the current record's "id" value
 * @method BtchartCompanyCategory setCompanyType()           Sets the current record's "company_type" value
 * @method BtchartCompanyCategory setCreatedAt()             Sets the current record's "created_at" value
 * @method BtchartCompanyCategory setUpdatedAt()             Sets the current record's "updated_at" value
 * @method BtchartCompanyCategory setBtchartCompanyDetails() Sets the current record's "BtchartCompanyDetails" collection
 * 
 * @package    sisterbt
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseBtchartCompanyCategory extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('btchart_company_category');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('company_type', 'string', 100, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 100,
             ));
        $this->hasColumn('created_at', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0000-00-00 00:00:00',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('updated_at', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0000-00-00 00:00:00',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 25,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('BtchartCompanyDetails', array(
             'local' => 'id',
             'foreign' => 'company_type_id'));
    }
}