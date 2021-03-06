<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('SbtPublisherRequestStatus', 'doctrine');

/**
 * BaseSbtPublisherRequestStatus
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $request_status_name
 * 
 * @method integer                   getId()                  Returns the current record's "id" value
 * @method string                    getRequestStatusName()   Returns the current record's "request_status_name" value
 * @method SbtPublisherRequestStatus setId()                  Sets the current record's "id" value
 * @method SbtPublisherRequestStatus setRequestStatusName()   Sets the current record's "request_status_name" value
 * 
 * @package    sisterbt
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseSbtPublisherRequestStatus extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('sbt_publisher_request_status');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('request_status_name', 'string', 200, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 200,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}