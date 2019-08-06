<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('UserStatus', 'doctrine');

/**
 * BaseUserStatus
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $userstatid
 * @property string $userstat
 * @property Doctrine_Collection $SfGuardUserProfile
 * 
 * @method integer             getUserstatid()         Returns the current record's "userstatid" value
 * @method string              getUserstat()           Returns the current record's "userstat" value
 * @method Doctrine_Collection getSfGuardUserProfile() Returns the current record's "SfGuardUserProfile" collection
 * @method UserStatus          setUserstatid()         Sets the current record's "userstatid" value
 * @method UserStatus          setUserstat()           Sets the current record's "userstat" value
 * @method UserStatus          setSfGuardUserProfile() Sets the current record's "SfGuardUserProfile" collection
 * 
 * @package    sisterbt
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseUserStatus extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('user_status');
        $this->hasColumn('userstatid', 'integer', 2, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 2,
             ));
        $this->hasColumn('userstat', 'string', 10, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 10,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('SfGuardUserProfile', array(
             'local' => 'userstatid',
             'foreign' => 'userstatid'));
    }
}